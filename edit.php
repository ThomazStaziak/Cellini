<?php 
  if ($_POST) {
    try {
        require "conexao.php";
      
        if (empty($_FILES["imagem"]["name"])) {
            $url_imagem = 'assets/img/receitas/default.jpg';
        } else if ($_FILES["imagem"]["error"] === 0) {
            $nomeArquivo = $_FILES["imagem"]["name"];
            $nomeTemp = $_FILES["imagem"]["tmp_name"];
            $url_imagem = "assets/img/receitas/" . $nomeArquivo;
    
            move_uploaded_file($nomeTemp, "./" . $url_imagem);
        }
        
        $consulta = $conexao->prepare("UPDATE receitas SET titulo = :titulo, conteudo = :conteudo, data = :data, url_imagem = :urlImagem WHERE id = :id");
        $atualizou = $consulta->execute([
            ':titulo' => $_POST["titulo"],
            ':conteudo' => $_POST["conteudo"],
            ':urlImagem' => $url_imagem,
            ':data' => date('Y-m-d'),
            ':id' => $_POST['id']
        ]);

        $conexao = null;

        if ($atualizou) {
            header("Location: panel.php");
        } 
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
  }


  try {
      require 'conexao.php';
      $consulta = $conexao->prepare("SELECT * FROM receitas WHERE id = :id");
      $consulta->execute([
          ':id' => $_GET['id']
      ]);
      
      $receita = $consulta->fetch(PDO::FETCH_ASSOC);
      $conexao = null;
  } catch (PDOException $erro) {
      echo $erro->getMessage();
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
    <script
      defer
      src="https://kit.fontawesome.com/20e8b326ff.js"
      crossorigin="anonymous"
    ></script>
    <!-- <==== bootstrap links ====> -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <!-- <===== include summernote css/js =====> -->
    <link
      href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css"
      rel="stylesheet"
    />
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
          <button
            class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span>&#9776;</span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav col-12 d-flex justify-content-between">
              <li class="nav-item">
                <a
                  class="nav-link c-nav__li c-nav__li--active"
                  href="index.html"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link c-nav__li" href="about.html">
                  <nobr>Quem somos</nobr>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link c-nav__li dropdown-toggle"
                  href="#"
                  id="navbarDropdownMenuLink"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Produtos
                </a>
                <div
                  class="c-nav__dropdown dropdown-menu p-0"
                  aria-labelledby="navbarDropdownMenuLink"
                >
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
        <div
          class="col-10 border rounded p-4"
          style="background-color: #f8f8f8"
        >
          <form action="edit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="tituloInput">Titulo</label>
              <input
                id="tituloInput"
                type="text"
                name="titulo"
                class="form-control"
                value="<?= $receita['titulo'] ?>"
              />
            </div>
            <div class="form-group">
              <label for="summernote">Conteúdo</label>
              <textarea id="summernote" name="conteudo"><?= $receita['conteudo'] ?></textarea>
            </div>

            <div class="form-group">
              <p>Imagem de capa atual</p>
              <img 
                src="<?= $receita['url_imagem'] ?>" 
                class="rounded w-100" 
                alt="Foto de capa da receita" 
                style="height: 350px;"
              >
            </div>

            <div class="form-group">
              <label for="imagemInput" class="btn btn-secondary col-12"
                >Imagem de capa</label
              >
              <input
                type="file"
                name="imagem"
                id="imagemInput"
                class="d-none"
              />
            </div>

            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

            <button type="submit" class="btn btn-warning font-weight-bold col-12 mt-2">
              Atualizar
            </button>
          </form>
        </div>
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
          <div
            class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="font-weight-bold">
              <i class="fas fa-map-marker-alt"></i>
              <span>Endereço</span>
            </div>
            <p class="my-2 text-center">
              Rua Jandiatuba, 630 - Conj. 142B <br />
              Morumbi - São Paulo / SP
            </p>
          </div>
          <div
            class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="font-weight-bold">
              <i class="fas fa-phone-alt"></i>
              <span>SAC</span>
            </div>
            <p class="my-2 text-center">0800-000-000</p>
          </div>
          <div
            class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="font-weight-bold">
              <i class="fas fa-phone-alt"></i>
              <span>Telefone</span>
            </div>
            <p class="my-2 text-center">+55 (11) 0000-0000</p>
          </div>
          <div
            class="col-6 col-md-3 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="font-weight-bold">
              <i class="fas fa-envelope"></i>
              <span>Email</span>
            </div>
            <p class="my-2 text-center">contato@cellinihome.com.br</p>
          </div>
        </div>
      </div>
      <div
        class="container-fluid d-flex justify-content-center align-items-center p-3"
      >
        <p class="m-0 text-white">Copyright &copy; Cellini 2019</p>
      </div>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

    <script>
      $("#summernote").summernote({
        placeholder: "Escreva sua receita aqui",
        tabsize: 2,
        height: 200,
        popover: {
          air: [
            ['color', ['color']],
            ['font', ['bold', 'underline', 'clear']]
          ]
        }
      });
    </script>
  </body>
</html>
