<?php 
  session_start();
  if (!$_SESSION["logged"]) {
      header("Location: adm.php");
  }
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
        
        $consulta = $conexao->prepare("UPDATE receitas SET titulo = :titulo, descricao = :descricao, conteudo = :conteudo, data = :data, url_imagem = :urlImagem WHERE id = :id");
        $atualizou = $consulta->execute([
            ':titulo' => $_POST["titulo"],
            ':descricao' => $_POST["descricao"],
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

  include 'header.php';
?>

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
              <label for="descricao">Descrição</label>
              <textarea name="descricao" id="descricao" class="form-control"><?= $receita['descricao'] ?></textarea>
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
              <label for="imagemInput" class="btn btn-info col-12"
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
            <div class="row d-flex justify-content-around">
                <a href="panel.php" class="col-4 mt-2 btn btn-secondary">Voltar</a>
                <button type="submit" class="col-7 btn btn-warning font-weight-bold mt-2">
                  Atualizar
                </button>
            </div>
          </form>
        </div>
      </div>
    </main>

   <?php include 'footer.php'; ?>