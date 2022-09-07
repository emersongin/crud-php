<?php 

  class Checa{

    public static function checarNome($nome){
      if(!preg_match('/[a-zA-Z]+/m', $nome)):
        return true;
      else:
        return false;
      endif;
  }
  public static function checarEmail($email){
    if($email === "teste@teste.com" || $email === "abc@abc.com"):
        return true;
    else:
      return false;
    endif;
  }
  public static function checarSenha($senha){
    if(strlen($senha) < "7" ):
        return true;
    else:
      return false;
    endif;
  }
  public static function checarFiltroEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
      return true;
    else:
      return false;
    endif;
  }

  }