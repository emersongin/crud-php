<header class="bg-dark">
  <div class="container">
    <nav class="navbar navbar-expand-sm navbar-dark">
      <a class="navbar-brand" href="<?= URL ?>">CadEmpresa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>/posts" data-tooltip="tooltip" title="Página inicial">Home</a>
          </li>
        </ul>

        <?php
        if (isset($_SESSION['user_id'])) : ?>
          <span class="navbar-text">
            <p>Olá, <?= $_SESSION['user_nome'] ?>, seja bem vindo!</p>
            <a class="btn btn-sm btn-danger" href="<?= URL ?>/users/sair">Sair</a>
          </span>
        <?php else : ?>
          <span class="navbar-text">
            <a class="btn btn-info" href="<?= URL ?>/users/register" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
            <a class="btn btn-info" href="<?= URL ?>/users/login" data-tooltip="tooltip" title="Tem uma conta? Faça login">Entrar</a>
          </span>
        <?php endif; ?>
      </div>
    </nav>
  </div>
</header>
