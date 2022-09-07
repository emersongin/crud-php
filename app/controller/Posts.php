<?php

class Posts extends Controller
{
  public function __construct()
  {
    if (!Sessao::estaLogado()) :
      URL::redirecionar('users/login');
    endif;
    $this->postmodel = $this->model('RegisterPost');
  }
  
  public function index()
  {
    $dados = [
      'posts' => $this->postmodel->read()
    ];
    $this->view('posts/index', $dados);
  }

  public function register()
  {

    $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if (isset($formulario)) :
      $dados = [
        'nome' => trim($formulario['nome']),
        'email' => trim($formulario['email']),
        'cnpj' => trim($formulario['cnpj']),
        'cep' => trim($formulario['cep']),
        'telefone' => trim($formulario['telefone']),
        'endereco' => trim($formulario['endereco']),
        'data_fundacao' => trim($formulario['data_fundacao']),
        'users_id' => $_SESSION['user_id']
      ];

      if (in_array("", $formulario)) :
        if (empty($formulario['nome'])) :
          $dados['nome_erro'] = 'Preencha o campo nome';
        endif;
        if (empty($formulario['email'])) :
          $dados['email_erro'] = 'Preencha o campo email';
        endif;
        if (empty($formulario['cep'])) :
          $dados['cep_erro'] = 'Preencha o campo cep';
        endif;
        if (empty($formulario['cnpj'])) :
          $dados['cnpj_erro'] = 'Preencha o campo cnpj';
        endif;
        if (empty($formulario['telefone'])) :
          $dados['telefone_erro'] = 'Preencha o campo telefone';
        endif;
        if (empty($formulario['endereco'])) :
          $dados['endereco_erro'] = 'Preencha o campo endereco';
        endif;
        if (empty($formulario['data_fundacao'])) :
          $dados['data_fundacao_erro'] = 'Preencha o campo datafundacao';
        endif;
      else :

        if ($this->postmodel->register($dados)) :
          Sessao::mensagem('post', 'Post cadastrado com sucesso');
          URL::redirecionar('posts/');
        else :
          die("Erro ao cadastrar post no banco de dados.");
        endif;


      endif;

    else :
      $dados = [
        'nome' => '',
        'email' => '',
        'cnpj' => '',
        'cep' => '',
        'endereco' => '',
        'telefone' => '',
        'data_fundacao' => '',
        'nome_erro' => '',
        'email_erro' => '',
        'cnpj_erro' => '',
        'cep_erro' => '',
        'endereco_erro' => '',
        'telefone_erro' => '',
        'data_fundacao_erro' => '',
      ];

    endif;

    $this->view('posts/register', $dados);
  }

  public function show($id)
  {
    $post = $this->postmodel->readId($id);
    $dados = [
      'posts' => $post,
    ];
    $this->view('posts/show', $dados);
  }

  public function update($id)
  {
    $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    if (isset($formulario, $dados)) :

      $dados = [
        'id' => $id,
        'nome' => trim($formulario['nome']),
        'email' => trim($formulario['email']),
        'cnpj' => trim($formulario['cnpj']),
        'cep' => trim($formulario['cep']),
        'telefone' => trim($formulario['telefone']),
        'endereco' => trim($formulario['endereco']),
        'data_fundacao' => trim($formulario['data_fundacao'])
      ];

      if (in_array("", $formulario)) :
        if (empty($formulario['nome'])) :
          $dados['nome_erro'] = 'Preencha o campo nome';
        endif;
        if (empty($formulario['email'])) :
          $dados['email_erro'] = 'Preencha o campo email';
        endif;
        if (empty($formulario['cep'])) :
          $dados['cep_erro'] = 'Preencha o campo cep';
        endif;
        if (empty($formulario['cnpj'])) :
          $dados['cnpj_erro'] = 'Preencha o campo cnpj';
        endif;
        if (empty($formulario['telefone'])) :
          $dados['telefone_erro'] = 'Preencha o campo telefone';
        endif;
        if (empty($formulario['endereco'])) :
          $dados['endereco_erro'] = 'Preencha o campo endereco';
        endif;
        if (empty($formulario['data_fundacao'])) :
          $dados['datafundacao_erro'] = 'Preencha o campo datafundacao';
        endif;
      else :

        if ($this->postmodel->update($dados)) :
          Sessao::mensagem('post', 'Post atualizado com sucesso');
          URL::redirecionar('posts/');
        else :
          die("Erro ao atualizar post no banco de dados.");
        endif;
      endif;
      
    else :
      $post = $this->postmodel->readId($id);

      if ($post->users_id != $_SESSION['user_id']) :
        Sessao::mensagem('post', 'Você não tem autorizaçãopara editar essse post.', 'alert alert-danger');
        URL::redirecionar('posts/');
      endif;

      $dados = [
        'id' => $post->id,
        'nome' => $post->name,
        'email' => $post->email,
        'cnpj' => $post->cnpj,
        'cep' => $post->cep,
        'endereco' => $post->endereco,
        'telefone' => $post->telefone,
        'data_fundacao' => $post->data_fundacao,
        'nome_erro' => '',
        'email_erro' => '',
        'cnpj_erro' => '',
        'cep_erro' => '',
        'endereco_erro' => '',
        'telefone_erro' => '',
        'data_fundacao_erro' => '',
      ];

    endif;

    $this->view('posts/update', $dados);
  }
  public function delete($id){
    if (!$this->checarautorização($id)) :

      $id = filter_var($id, FILTER_VALIDATE_INT);
      $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_STRING);

      if ($id && $metodo == 'POST') :
        if ($this->postmodel->delete($id)) :
          Sessao::mensagem('post', 'Post Deletado com sucesso.');
          URL::redirecionar('posts/');
        endif;
      else :
        Sessao::mensagem('post', 'Você não tem autorização para deletar essse post.', 'alert alert-danger');
        URL::redirecionar('posts/');
      endif;

    else :
      Sessao::mensagem('post', 'Você não tem autorização para deletar essse post.', 'alert alert-danger');
      URL::redirecionar('posts/');
    endif;
  }
  private function checarautorização($id)
  {
    $post = $this->postmodel->readId($id);

    if ($post->users_id != $_SESSION['user_id']) :
      return true;
    else :
      return false;
    endif;
  }
}
