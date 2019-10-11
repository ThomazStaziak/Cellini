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
        
        $consulta = $conexao->prepare("INSERT INTO receitas (titulo, descricao, conteudo, data, url_imagem) VALUES (:titulo, :descricao, :conteudo, :data, :urlImagem)");
        $inseriu = $consulta->execute([
            ':titulo' => $_POST["titulo"],
            ':descricao' => $_POST["descricao"],
            ':conteudo' => $_POST["conteudo"],
            ':urlImagem' => $url_imagem,
            ':data' => date('Y-m-d'),
        ]);

        $conexao = null;

        if ($inseriu) {
            header("Location: panel.php");
        } 
    } catch (PDOException $erro) {
        echo $erro->getMessage();
    }
  }

  include 'header.php';
?>

    <main>
      <div class="container d-flex justify-content-center mt-4">
        <div
          class="col-10 border rounded p-4"
          style="background-color: #f8f8f8"
        >
          <form action="insert.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="tituloInput">Titulo</label>
              <input
                id="tituloInput"
                type="text"
                name="titulo"
                class="form-control"
              />
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" id="descricao" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="summernote">Conteúdo</label>
              <textarea id="summernote" name="conteudo"></textarea>
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
            <div class="row d-flex justify-content-around">
                <a href="panel.php" class="col-4 mt-2 btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-success col-7 mt-2">
                  Adicionar
                </button>
            </div>
          </form>
        </div>
      </div>
    </main>

    <?php include 'footer.php'; ?>