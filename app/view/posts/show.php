<div class="container my-5">
  <div class="card">

    <div class="card-body bg-secondary text-center text-white">
      <h5 class="card-title"><?= $dados['posts']->name ?></h5>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <h5>Email: </h5><?= $dados['posts']->email ?>
      </li>
      <li class="list-group-item">
        <h5>Cep: </h5><?= $dados['posts']->email ?>
      </li>
      <li class="list-group-item">
        <h5>Cnpj: </h5><?= $dados['posts']->cnpj ?>
      </li>
      <li class="list-group-item">
        <h5>Telefone: </h5><?= $dados['posts']->telefone ?>
      </li>
      <li class="list-group-item">
        <h5>Endereço: </h5><?= $dados['posts']->endereco ?>
      </li>
      <li class="list-group-item">
        <h5>Data de Fundação: </h5><?=
         $data_normal = date("d/m/Y", strtotime($dados['posts']->data_fundacao));
          ?>
      </li>
    </ul>
    <div class="card-body d-flex ">
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="<?= URL ?>/posts" class="btn btn-sm btn-primary">Home</a>
        </li>
        <?php if ($dados['posts']->users_id == $_SESSION['user_id']) : ?>
          <li class="list-inline-item">
            <a href="<?= URL . '/posts/update/' . $dados['posts']->id ?>" class="btn btn-sm btn-primary">Editar</a>
          </li>
          <li class="list-inline-item">
            <form action="<?= URL . '/posts/delete/' . $dados['posts']->id ?>" method="POST" onsubmit="confirmDelete(event, this)">
              <input type="submit" class=" delete btn btn-sm btn-danger" value="Deletar">
            </form>
          </li>
      </ul>

    <?php endif; ?>
    </div>

  </div>
</div>
  <script>
    function confirmDelete(event, form) {
        event.preventDefault()
        var decisao = confirm("Voce deseja deletar essa empresa?")

        if (decisao) {
            form.submit();
        }
    }
</script>
