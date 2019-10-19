<?php
  if ($_GET && $_GET['search']) {
    try {
      require 'conexao.php';
      $consulta = $conexao->prepare("SELECT * FROM receitas WHERE titulo LIKE :titulo");
      $consulta->execute([
        ':titulo' => '%' . $_GET['search'] . '%'
      ]);
      $receitaSearch = $consulta->fetch(PDO::FETCH_ASSOC);
      $conexao = null;
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
  }

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
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-9">
        <form action="recipes.php" class="w-100 row m-0">
          <input class="w-75 form-control" type="text" name="search" placeholder="Digite o nome da receita...">
          <button class="btn btn-danger w-25">Buscar <i class="fas fa-search d-inline-block ml-2"></i></button>
        </form>
      </div>
      <div class="col-12 col-md-9">
        <?php if($receitaSearch) : ?>
          <div class="col mt-4 border px-0">
            <img
              class="w-100"
              height="350"
              src="<?= $receitaSearch['url_imagem'] ?>"
              alt=""
            />
            <h2 class="text-center my-3"><?= $receitaSearch['titulo'] ?></h2>
            <p class="px-2"><?= strlen($receitaSearch['descricao']) < 200 ? substr($receitaSearch["descricao"], 0, 200) . '...' : substr($receitaSearch["descricao"], 0, 200) ?></p>
            <a href="recipe.php?id=<?= $receitaSearch['id'] ?>" class="d-block px-2">Ler mais</a>
          </div>
        <?php else : ?>
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
        <?php endif; ?>        
      </div>
      <div class="col-3 d-none d-md-inline-block">
        <h2 class="mt-4">Receitas recentes</h2>
        <?php foreach(array_slice($receitas, 0, 5) as $receita) : ?>
          <p>
            <a href="recipe.php?id=<?= $receita['id'] ?>"><?= $receita['titulo'] ?></a>
          </p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</main>

<?php include 'footer.php' ?>
