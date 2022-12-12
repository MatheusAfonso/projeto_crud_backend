<?php
  namespace App\Services;

  use App\Models\Pessoa;

  class PessoaService
  {
    public function get() 
    {
      
      if ($_GET['cpfCnpj'] !== null && $_GET['senha'] !== null) {
        return Pessoa::select($_GET['cpfCnpj'], $_GET['senha']);
      } else if($_GET['tipo'] !== null) {
        return Pessoa::selectAllFiltered($_GET['tipo']);
      } else if($_GET['id'] !== null) {
        return Pessoa::selectById($_GET['id']);
      } else if ($_GET['delete'] !== null) {
        return Pessoa::delete($_GET['delete']);
      } else {
        return Pessoa::selectAll();
      }
    }

    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Pessoa::insert($data);
    }

    public function put()
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Pessoa::update($data);
    }
 }
?>