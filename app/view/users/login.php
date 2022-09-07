<?php
if (Sessao::estaLogado()) :
  URL::redirecionar('posts');
endif;
?>

<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
  <div class="card-header bg-secondary text-white">
      <h2>Login</h2>
    </div>
      <div class="card-body">
      <?= Sessao::mensagem('user') ?>
          <small>Preencha o formulário abaixo para fazer o login</small>
          <form name="login" method="POST" action="<?= URL ?>/Users/login" class="mt-4">

            <div class="form-group">
              <label for="email" >Email: <sup class="text-danger">*</sup></label>
              <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?php if(isset($dados['email_erro'])){echo $dados['email_erro'] ? 'is-invalid' : '';}; ?>" >
              <div class="invalid-feedback">
                    <?=  $dados['email_erro'] ?>
              </div>
            </div>
            <div class="form-group">
              <label for="senha" >Senha: <sup class="text-danger">*</sup></label>
              <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control <?php if(isset($dados['senha_erro'])){echo $dados['senha_erro'] ? 'is-invalid' : '';}; ?>" >
              <div class="invalid-feedback">
                    <?=  $dados['senha_erro'] ?>
              </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="entrar" class="btn btn-info btn-block">
                </div>
                <div class="col">
                    <a href="<?= URL ?>/users/register" >Não possue uma conta? Cadastre-se</a>
                </div>
            </div>

          </form>
      </div>
  </div>
</div>