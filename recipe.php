<?php
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

  include 'header.php';
?>


<main style="margin-top: 15px;">
  <div class="container">
      <div class="col mt-4 px-0">
        <img
          class="w-100"
          height="450"
          src="<?= $receita['url_imagem'] ?>"
          alt=""
        />
        <h1 class="text-center my-3"><?= $receita['titulo'] ?></h1>
        <p class="px-2"><?= $receita['conteudo'] ?></p>
      </div>
  </div>
  <a href="recipes.php" class="d-block mt-5 text-center">Ver todas as receitas</a>
</main>

<?php include 'footer.php' ?>
