<?php
  try {
      require 'conexao.php';
      $consulta = $conexao->query("SELECT * FROM receitas");
      $receitas = $consulta->fetchAll(PDO::FETCH_ASSOC);
      $receitas = array_reverse($receitas);
      $conexao = null;
  } catch (PDOException $erro) {
      echo $erro->getMessage();
  }

  if ($_POST) {
    if($_POST['email'] != 'adm@adm.com' || $_POST['password'] != 'adm') {
      header('Location: adm.php?error=true');
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Cellini</title>
  <!-- <==== fa icons ====> -->
  <script defer src="https://kit.fontawesome.com/20e8b326ff.js" crossorigin="anonymous"></script>
  <!-- <==== bootstrap links ====> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script defer src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script defer src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <!-- <==== custom css link ====> -->
  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body class="d-flex flex-column h-100">
  <header>
    <nav class="c-nav navbar navbar-expand-lg">
      <div class="container d-flex justify-content-between">
        <a class="navbar-brand" href="#">
          <img src="./assets/img/logo.png" alt="Logo Cellini" height="150" />
        </a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span>&#9776;</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav col-12 d-flex justify-content-between">
            <li class="nav-item">
              <a class="nav-link c-nav__li c-nav__li--active" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link c-nav__li" href="about.html">
                <nobr>Quem somos</nobr>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link c-nav__li dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
              </a>
              <div class="c-nav__dropdown dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Liquidificadores</a>
                <a class="dropdown-item" href="#">Batedeiras</a>
                <a class="dropdown-item" href="#">Ferros de passar</a>
                <a class="dropdown-item" href="#">Ventiladores</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link c-nav__li" href="#">Receitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link c-nav__li" href="contact.html">Contato</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container d-flex justify-content-center mt-4">
      <ul class="list-group col-8">
        <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color: #e8e8e8">
          <span>Suas receitas</span>
          <a href="insert.php" class="btn btn-success">Adicionar Receita</a>
        </li>
        <?php foreach($receitas as $receita) : ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span><b><?= $receita["titulo"] ?></b> publicada em <?= date('d/m/Y', strtotime($receita['data']))?></span>
          <div>
            <a href="edit.php?id=<?= $receita["id"] ?>">
              <i class="fas fa-edit"></i>
            </a>
            <a href="delete.php?id=<?= $receita["id"] ?>" class="d-inline-block ml-3">
              <i class="fas fa-trash"></i>
            </a>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>

  <div class="c-social-icons container-fluid p-5 text-center">
    <p>Curta nossas redes sociais</p>
    <span class="d-inline-block mr-2">
      <i class="fab fa-facebook-f"></i>
    </span>
    <span class="d-inline-block">
      <i class="fab fa-instagram"></i>
    </span>
  </div>

  <footer class="c-secondary-bg footer mt-auto">
    <div class="container-fluid c-main-bg p-5">
      <div class="row">
        <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center">
          <div class="font-weight-bold">
            <i class="fas fa-map-marker-alt"></i>
            <span>Endereço</span>
          </div>
          <p class="my-2 text-center">
            Rua Jandiatuba, 630 - Conj. 142B <br />
            Morumbi - São Paulo / SP
          </p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center">
          <div class="font-weight-bold">
            <i class="fas fa-phone-alt"></i>
            <span>SAC</span>
          </div>
          <p class="my-2 text-center">0800-000-000</p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center">
          <div class="font-weight-bold">
            <i class="fas fa-phone-alt"></i>
            <span>Telefone</span>
          </div>
          <p class="my-2 text-center">+55 (11) 0000-0000</p>
        </div>
        <div class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center">
          <div class="font-weight-bold">
            <i class="fas fa-envelope"></i>
            <span>Email</span>
          </div>
          <p class="my-2 text-center">contato@cellinihome.com.br</p>
        </div>
      </div>
    </div>
    <div class="container-fluid d-flex justify-content-center align-items-center p-3">
      <p class="m-0 text-white">Copyright &copy; Cellini 2019</p>
    </div>
  </footer>
</body>

</html>