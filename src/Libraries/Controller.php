<?php 


  class Controller {

    public function model($model){
      require_once '../app/model/'. $model. '.php';
      return new $model;
    }

    public  function view($view, $dados = [])
    {
      $arquivo = ('../app/view/'. $view. '.php');
      if(file_exists($arquivo)):
        require_once $arquivo;
      else:
        die('O arquivo de view nao existe.');
      endif;
    }

  }