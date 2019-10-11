<?php 
  session_start();
  if (!$_SESSION["logged"]) {
      header("Location: adm.php");
  }
  if ($_POST) {
    try {
        require "conexao.php";
      
        $consulta = $conexao->prepare("DELETE FROM receitas WHERE id = :id");
        $deletou = $consulta->execute([
            ':id' => $_POST['id']
        ]);

        $conexao = null;

        if ($deletou) {
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

  include 'header.php';
?>

    <main>
      <div class="container d-flex align-items-center justify-content-center" style="height: 90vh">
        <div class="col-8 border rounded p-4" style="background-color: #f8f8f8">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="tituloInput">Titulo</label>
                    <input readonly id="tituloInput" type="text" name="titulo" class="form-control" value="<?= $receita["titulo"] ?>">
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <textarea name="descricao" id="descricao" class="form-control"><?= $receita['descricao'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="summernote">Conteúdo</label>
                    <textarea readonly name="conteudo" id="summernote" cols="30" rows="10" class="form-control"><?= $receita["conteudo"] ?></textarea>
                </div>

                <input type="hidden" name="id" value="<?= $receita["id"] ?>">
                <div class="row d-flex justify-content-around">
                    <a href="panel.php" class="col-4 mt-2 btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-danger col-7 mt-2">Deletar</button>
                </div>
            </form>
        </div>
      </div>
    </main>

    <?php include 'footer.php'; ?>