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
    <script
      defer
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      defer
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      defer
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <!-- <==== custom css link ====> -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
  </head>
  <body class="d-flex flex-column h-100">
    <header>
      <nav class="c-nav navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between">
          <a class="navbar-brand" href="index.html">
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
                <a class="nav-link c-nav__li" href="about.html"
                  ><nobr>Quem somos</nobr></a
                >
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

    <!-- Begin page content -->
    <main role="main" class="flex-shrink-0">
      <!-- Carousel section -->
      <div
        id="carouselExampleIndicators"
        class="carousel slide d-none d-md-block d-lg-block"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="./assets/img/carousel/Arte-banner-liq.jpg"
              class="d-block w-100"
              alt="Banner Liquidificador"
            />
          </div>
          <div class="carousel-item">
            <img
              src="./assets/img/carousel/Arte-banner-ferro.jpg"
              class="d-block w-100"
              alt="Banner Ferro de passar"
            />
          </div>
          <div class="carousel-item">
            <img
              src="./assets/img/carousel/Arte-banner-bat.jpg"
              class="d-block w-100"
              alt="Banner Batedeira"
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Main products section -->
      <div class="c-main-bg p-4">
        <h2 class="text-center mb-4">Nossa Linha De Produtos</h2>
        <div class="container">
          <div class="row">
            <a href="#" class="col-md-4 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-Liq.jpg"
                alt="Thumb Liquidificador"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">
                Liquidificadores
              </footer>
            </a>
            <a href="#" class="col-md-4 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-bat.jpg"
                alt="Thumb Batedeiras"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">Batedeiras</footer>
            </a>
            <a href="#" class="col-md-4 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-ferros.jpg"
                alt="Thumb Ferro de passar"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">
                Ferros de passar
              </footer>
            </a>
          </div>
        </div>
      </div>
      <div class="c-recipe-container p-4">
        <h2 class="text-center mb-4">Receitas</h2>
        <div class="container">
          <div class="row">
            <?php foreach($receitas as $receita) : ?>
              <div class="col-md-4 col-sm-12">
                <img
                  src="<?= $receita['url_imagem'] ?>"
                  alt="Foto de capa da receita"
                  class="w-100"
                />
                <div class="c-recipe">
                  <h3 class="mt-3"><?= $receita['titulo'] ?></h3>
                  <p>
                    <?= substr($receita["conteudo"], 0, 40) . '...' ?>
                  </p>
                  <a href="#">Ler Mais</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
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
  </body>
</html>
