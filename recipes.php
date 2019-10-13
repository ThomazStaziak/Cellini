<?php
  try {
      require 'conexao.php';
      $consulta = $conexao->query("SELECT * FROM receitas");
      $receitas = $consulta->fetchAll(PDO::FETCH_ASSOC);
      $receitas = array_reverse(array_slice($receitas, 0, 3));
      $conexao = null;
  } catch (PDOException $erro) {
      echo $erro->getMessage();
  }

  include 'header.php';
?>


<main style="margin-top: 15px;">
  <div class="container col-7">
    <?php foreach($receitas as $receita) : ?>
      <div class="col mt-4 border px-0">
        <img
          class="w-100"
          height="350"
          src="<?= $receita['url_imagem'] ?>"
          alt=""
        />
        <h2 class="text-center my-3"><?= $receita['titulo'] ?></h2>
        <p class="px-2"><?= strlen($receita['descricao']) < 200 ? substr($receita["descricao"], 0, 200) . '...' : substr($receita["descricao"], 0, 200) ?></p>
        <a href="recipe.php?id=<?= $receita['id'] ?>" class="d-block px-2">Ler mais</a>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include 'footer.php' ?>
