<?php include 'header.php'; ?>

  <main>

    <div class="container col-6 pt-5">
      <form action="panel.php" method="POST">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input id="email" type="email" class="form-control <?php if($_GET["error"]) { echo 'is-invalid'; } ?>" name="email">
          <?php if($_GET["error"]) : ?>
            <div class="invalid-feedback">
              email ou senha inválido
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="senha">Senha</label>
          <input id="senha" type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
          <button class="btn btn-danger col-12">Login</button>
        </div>
      </form>
    </div>
  </main>
  <?php include 'footer.php'; ?>