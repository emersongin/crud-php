<div class="container py-5">
  <div class="card">
    <div class="card-header">
      Empresas Cadastradas
      <?php
      if (isset($_SESSION['user_id'])) : ?>
        <div class="float-right">
          <a href="<?= URL ?>/posts/register" class="btn btn-info">cadastrar</a>
        </div>
      <?php endif; ?>
    </div>
    <div class="card-body">
      <?= Sessao::mensagem('post') ?>
      <table class="table" id="empresa-table">
        <theade>
          <tr>
            <th class="th" scope="col">id</th>
            <th class="th" scope="col">Nome</th>
            <th class="th" scope="col">email</th>
            <th class="th" scope="col">cep</th>
            <th class="th" scope="col">Cnpj</th>
            <th class="th" scope="col">Telefone</th>
            <th class="th" scope="col">Endereço</th>
            <th class="th" scope="col">Data de Fundação</th>
          </tr>
        </theade>
        <tbody>
        <?php foreach ($dados['posts'] as $post) : ?>
            <tr>
              <td class="td" scope="row" class="col-id"><?= $post->id ?></td>
              <td class="td" scope="row"><?= $post->name ?></td>
              <td class="td" scope="row"><?= $post->email ?></td>
              <td class="td" scope="row"><?= $post->cep ?></td>
              <td class="td" scope="row"><?= $post->cnpj ?></td>
              <td class="td" scope="row"><?= $post->telefone ?></td>
              <td class="td" scope="row"><?= $post->endereco ?></td>
              <td class="td" scope="row"><?=
               $data_normal = date("d/m/Y", strtotime( $post->data_fundacao));
               
               ?></td>
              <td>
                <a href="<?= URL.'/posts/show/'.$post->empresaId ?>"><i class="fas fa-eye check-icon"></i></a>
              </td>
            </tr>
            <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>