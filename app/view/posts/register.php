<div class="col-md-8 mx-auto p-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= URL ?>/posts">Posts</a></li>
      <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
  </ol>
</nav>

  <div class="card">
  <div class="card-header bg-secondary text-white">
      <h2>Criar Post</h2>
    </div>
      <div class="card-body">
        
          <small>Preencha o formulário abaixo para criar post</small>
          <form name="login" method="POST" action="<?= URL ?>/posts/register" class="mt-4">

            <div class="form-group">
              <label for="nome" >Nome da Empresa: <sup class="text-danger">*</sup></label>
              <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?php if(isset($dados['nome_erro'])){echo $dados['nome_erro'] ? 'is-invalid' : '';}; ?>" >
              <div class="invalid-feedback">
                    <?=  $dados['nome_erro'] ?>
              </div>

            </div>
            <div class="form-group">
              <label for="cep" >Cep: <sup class="text-danger">*</sup></label>
              <input type="text" name="cep" id="cep" value="<?= $dados['cep'] ?>" class="form-control <?php if(isset($dados['cep_erro'])){echo $dados['cep_erro'] ? 'is-invalid' : '';}; ?>" maxlength="9" >
             
              <div class="invalid-feedback">
                    <?=  $dados['cep_erro'] ?>
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
              <label for="cnpj" >CNPJ: <sup class="text-danger">*</sup></label>
              <input type="text" name="cnpj" id="cnpj" value="<?= $dados['cnpj'] ?>" class="form-control <?php if(isset($dados['cnpj_erro'])){echo $dados['cnpj_erro'] ? 'is-invalid' : '';}; ?>" maxlength="18" onkeyup="mascara_cnpj()" >
              <div class="invalid-feedback">
                    <?=  $dados['cnpj_erro'] ?>
              </div>

            </div>

            <div class="form-group">
              <label for="endereco" >Endereço: <sup class="text-danger">*</sup></label>
              <input type="text" name="endereco" id="localidade" value="<?= $dados['endereco'] ?>" class="form-control <?php if(isset($dados['endereco_erro'])){echo $dados['endereco_erro'] ? 'is-invalid' : '';}; ?>" >
              <div class="invalid-feedback">
                    <?=  $dados['endereco_erro'] ?>
              </div>

            </div>

            <div class="form-group">
              <label for="telefone" >Telefone: <sup class="text-danger">*</sup></label>
              <input type="text" name="telefone" id="telefone" value="<?= $dados['telefone'] ?>" class="form-control <?php if(isset($dados['telefone_erro'])){echo $dados['telefone_erro'] ? 'is-invalid' : '';}; ?>" maxlength = "13" onkeyup="mascara_telefone()" >
              <div class="invalid-feedback">
                    <?=  $dados['telefone_erro'] ?>
              </div>

            </div>

            <div class="form-group">
              <label for="data_fundacao" >Data Fundação: <sup class="text-danger">*</sup></label>
              <input type="date" name="data_fundacao" id="data_fundacao" value="<?=  $data_americana ?>" class="form-control <?php if(isset($dados['data_fundacao_erro'])){echo $dados['data_fundacao_erro'] ? 'is-invalid' : '';}; ?>">
              <div class="invalid-feedback">
                    <?=  $dados['data_fundacao_erro'] ?>
              </div>
            </div>
            
                    <input type="submit" value="cadastrar" class="btn btn-info btn-block">
             
          </form>
      </div>
      
  </div>
</div>

