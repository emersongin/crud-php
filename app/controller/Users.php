<?php 

  class Users extends Controller{
    public function __construct()
    {
       $this->usuarioModel = $this->model('User');
    }
    public function register(){

      $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if(isset($formulario)):
        $dados = [
          'nome' => trim($formulario['nome']),
          'email' => trim($formulario['email']),
          'senha' => trim($formulario['senha']),
          'confirma_senha' => trim($formulario['confirma_senha']),
        ];

          if(in_array("", $formulario)):
            if (empty($formulario['nome'])) :
              $dados['nome_erro'] = 'Preencha o campo nome';
            endif;
            if (empty($formulario['email'])) :
              $dados['email_erro'] = 'Preencha o campo email';
            endif;
            if (empty($formulario['senha'])) :
              $dados['senha_erro'] = 'Preencha o campo senha';
            endif;
            if (empty($formulario['confirma_senha'])) :
              $dados['confirma_senha_erro'] = 'Confirme a senha';
            endif;
          else:
            if(Checa::checarNome($formulario['nome'])):
              $dados['nome_erro'] = 'O nome está invalido!';
            elseif(Checa::checarFiltroEmail($formulario['email'])):
              $dados['email_erro'] = 'Este email é invalido.';
            elseif(Checa::checarEmail($formulario['email'])):
              $dados['email_erro'] = 'Este email não pode ser cadastrado!';
              elseif($this->usuarioModel->checarEmail($formulario['email'])):
                $dados['email_erro'] = 'Este email ja esta cadastrado!';
            elseif (strlen($formulario['senha']) < 7) :
              $dados['senha_erro'] = 'Senha deve conter no minimo 7 caracteres.';
            elseif ($formulario['senha'] != $formulario['confirma_senha']) :
              $dados['confirma_senha_erro'] = 'A senha esta diferente da primeira.';
            else:
              $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

              if($this->usuarioModel->armazenar($dados)):
                Sessao::mensagem('user', 'Cadastro realizado com sucesso');
                URL::redirecionar('users/login');
              else:
                die("Erro ao armazenar usuario no banco de dados.");
              endif;
            endif;
          endif;
      else:
        $dados = [
          'nome' => '',
          'email' => '',
          'senha' => '',
          'confirma_senha' => '',
          'nome_erro' => '',
          'email_erro' => '',
          'senha_erro' => '',
          'confirma_senha_erro' => '',
        ];
      endif;


      $this->view('users/register', $dados);
    }

    public function login(){

      $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      if(isset($formulario)):
        $dados = [
          'email' => trim($formulario['email']),
          'senha' => trim($formulario['senha']),
        ];

      if(in_array("", $formulario)):
        if(empty($formulario['email'])):
          $dados['email_erro'] = 'Preencha o campo email';
        endif;
        if(empty($formulario['senha'])):
          $dados['senha_erro'] = 'Preencha o campo senha'; 
        endif;

      else:
        if(Checa::checarEmail($formulario['email'])):
          $dados['email_erro'] = 'Este email é invalido.';
        else:
          $user = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);

            if($user):
              $this->criarSessaoUsuario($user);
            else:
              Sessao::mensagem('user', 'Usuario ou senha invalidos', 'alert alert-danger');
            endif;
        endif;
      endif;

      else:
        $dados = [
          'email' => '',
          'senha' => '',
          'email_erro' => '',
          'senha_erro' => '',
        ];

      endif;
      $this->view('users/login', $dados);
    }

    private function criarSessaoUsuario($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_nome'] = $user->name;
      $_SESSION['user_email'] = $user->email;

      URL::redirecionar('posts');
    }

    public function sair(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_nome']);
      unset($_SESSION['user_email']);

      session_destroy();
      Sessao::mensagem('user', 'Usuario ou senha invalidos', 'alert alert-danger');
      URL::redirecionar('users/login');
    }

  }