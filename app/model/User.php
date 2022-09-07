<?php

class User
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function checarEmail($email)
  {
    $this->db->query("SELECT email FROM users WHERE email = :e");
    $this->db->bind(":e", $email);

    if ($this->db->resultado()) :
      return true;
    else :
      return false;
    endif;
  }

  public function armazenar($dados)
  {
    $this->db->query("INSERT INTO users(name, email, password) VALUES (:nome, :email, :senha)");
    $this->db->bind("nome", $dados['nome']);
    $this->db->bind("email", $dados['email']);
    $this->db->bind("senha", $dados['senha']);

    if ($this->db->executa()) :
      return true;
    else :
      return false;
    endif;
  }
  public function checarLogin($email, $senha)
  {
    $this->db->query("SELECT * FROM users WHERE email = :e");
    $this->db->bind(":e", $email);

    if ($this->db->executa()) :
      $resultado = $this->db->resultado();
      if (password_verify($senha, $resultado->password)) :
        return $resultado;
      else :
        return false;
      endif;
    else :
      return false;
    endif;
  }
}
