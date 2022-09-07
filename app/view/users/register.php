<div class="col-xl-4 col-md-6 mx-auto p-5">
  <div class="card">
    <div class="card-header bg-secondary text-white">
      <h2>Cadastre-se</h2>
    </div>
      <div class="card-body">
          <small>Preencha o formulário abaixo para fazer seu cadastro</small>
          <form name="cadastrar" method="POST" action="<?= URL ?>/Users/register" class="mt-4">
            <div class="form-group">
                <label for="nome">Nome: <sup class="text-danger">*</sup></label>
                <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?php if(isset($dados['nome_erro'])){echo $dados['nome_erro'] ? 'is-invalid' : '';}; ?>">
                <div class="invalid-feedback">
                    <?=  $dados['nome_erro'] ?>
                </div>
            </div>
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

            <div class="form-group">
              <label for="confirma_senha" >Confirme Senha: <sup class="text-danger">*</sup></label>
              <input type="password" name="confirma_senha" id="confirma_senha" value="<?= $dados['confirma_senha'] ?>" class="form-control <?php if(isset($dados['confirma_senha_erro'])){echo $dados['confirma_senha_erro'] ? 'is-invalid' : '';}; ?>" >
              <div class="invalid-feedback">
                    <?=  $dados['confirma_senha_erro'] ?>
              </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="cadastrar" class="btn btn-info btn-block">
                </div>
                <div class="col">
                    <a href="<?= URL ?>/users/login" >Você ja tem conta? Faça o login</a>
                </div>
            </div>

          </form>
      </div>
  </div>
</div>