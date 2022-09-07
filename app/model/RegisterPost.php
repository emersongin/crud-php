<?php 

  class RegisterPost{
    private $db;

    public function __construct()
    {
      $this->db = new Database();
    }
    public function read(){
      $this->db->query("SELECT *, empresa.id as empresaId FROM empresa ORDER BY empresa.id DESC");
      return $this->db->resultados();

    }
    public function register($dados){
      $this->db->query("INSERT INTO empresa (name, cnpj, cep, data_fundacao, email, telefone, endereco, users_id) VALUES (:nome, :cnpj, :cep, :data_fundacao, :email, :telefone, :endereco, :usuario_id)");

      $data_timestamp = strtotime($dados['data_fundacao']);
      $data_americana = date("Y/m/d", $data_timestamp);

      $this->db->bind("nome",$dados['nome']);
      $this->db->bind("usuario_id",$dados['users_id']);
      $this->db->bind("email",$dados['email']);
      $this->db->bind("cep",$dados['cep']);
      $this->db->bind("cnpj",$dados['cnpj']);
      $this->db->bind("data_fundacao",$dados['data_fundacao']);
      $this->db->bind("telefone",$dados['telefone']);
      $this->db->bind("endereco",$dados['endereco']);

      if($this->db->executa()):
        return true;
      else:
        return false;
      endif;
    }

    public function update($dados){

      $this->db->query("UPDATE empresa SET name= :nome, cnpj = :cnpj, cep= :cep, data_fundacao = :data_fundacao, email = :email, telefone = :telefone, endereco = :endereco WHERE id = :id ");
  
      $data_timestamp = strtotime($dados['data_fundacao']);
      $data_normal = date("d/m/Y", $data_timestamp);
  
      $this->db->bind("nome",$dados['nome']);
      $this->db->bind("id",$dados['id']);
      $this->db->bind("email",$dados['email']);
      $this->db->bind("cep",$dados['cep']);
      $this->db->bind("cnpj",$dados['cnpj']);
      $this->db->bind("data_fundacao",$dados[date("d/m/Y", $data_timestamp)]);
      $this->db->bind("telefone",$dados['telefone']);
      $this->db->bind("endereco",$dados['endereco']);
  
      if($this->db->executa()):
        return true;
      else:
        return false;
      endif;
    }
    public function readId($id){
      $this->db->query("SELECT * FROM empresa WHERE id = :id");
      $this->db->bind('id', $id);
  
      return $this->db->resultado();
    }
    public function delete($id){
      $this->db->query("DELETE FROM empresa  WHERE id = :id ");
      $this->db->bind("id", $id);

      if($this->db->executa()):
        return true;
      else:
        return false;
      endif;
    }
  }