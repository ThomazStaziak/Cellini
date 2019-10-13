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
    session_start();
    $_SESSION['logged'] = true;
  }

  include 'header.php';
?>

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

  <?php include 'footer.php'; ?>