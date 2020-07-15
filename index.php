<?php
  try {
      require 'conexao.php';
      $consulta = $conexao->query("SELECT * FROM receitas ORDER BY id DESC LIMIT 3");
      $receitas = $consulta->fetchAll(PDO::FETCH_ASSOC);
      $conexao = null;
  } catch (PDOException $erro) {
      echo $erro->getMessage();
  }

  include 'header.php';
?>

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
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
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
            src="./assets/img/carousel/Arte-banner-bat.jpg"
            class="d-block w-100"
            alt="Banner Batedeira"
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
              src="./assets/img/carousel/Arte-banner-ventilador.jpg"
              class="d-block w-100"
              alt="Banner Ventilador"
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
            <a href="blenders.php" class="col-md-3 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-Liq.jpg"
                alt="Thumb Liquidificador"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">
                Liquidificadores
              </footer>
            </a>
            <a href="churns.php" class="col-md-3 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-bat.jpg"
                alt="Thumb Batedeiras"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">Batedeiras</footer>
            </a>
            <a href="irons.php" class="col-md-3 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-ferros-breve.jpg"
                alt="Thumb Ferro de passar"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">
                Ferros de passar
              </footer>
            </a>
            <a href="irons.php" class="col-md-3 col-sm-12">
              <img
                src="./assets/img/thumbs/thumb-ventilador.jpg"
                alt="Thumb Ferro de passar"
                class="w-100"
              />
              <footer class="text-center mt-4 text-dark">
                Ventiladores
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
                  height="250"
                />
                <div class="c-recipe">
                  <h3 class="mt-3"><?= $receita['titulo'] ?></h3>
                  <p>
                    <?= substr($receita["descricao"], 0, 40) . '...' ?>
                  </p>
                  <a href="recipe.php?id=<?= $receita['id'] ?>">Ler Mais</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </main>
    
  <?php include 'footer.php'; ?>

  <!-- 
      TODO - Inserir a aba para 1 ventilador – em anexo

      TODO - Inserir cores dos Ferros – seguir as cores no arquivo pdf

      TODO - Inserir os manuais de instruções para download: Liq 3 arquivos e 1 de batedeira
-->