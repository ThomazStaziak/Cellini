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
      href="./assets/css/summernote.css"
      rel="stylesheet"
    />
    <!-- <==== custom css link ====> -->
    <link rel="stylesheet" href="./assets/css/styles.css" />
  </head>

  <body class="d-flex flex-column h-100">
    <header>
      <nav class="c-nav navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between">
          <a class="navbar-brand" href="index.php">
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
                  class="nav-link c-nav__li"
                  href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link c-nav__li" href="about.php">
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
                  <a class="dropdown-item" href="blenders.php">Liquidificadores</a>
                  <a class="dropdown-item" href="churns.php">Batedeiras</a>
                  <a class="dropdown-item" href="irons.php">Ferros de passar</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link c-nav__li" href="recipes.php">Receitas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link c-nav__li" href="contact.php">Contato</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>