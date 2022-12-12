<?php
  namespace App\Services;

  use App\Models\Produto;

  class ProdutoService
  {
    public function get() 
    {
      if ($_GET['id'] !== null) {
        return Produto::select($_GET['id']);
      } else if ($_GET['delete'] !== null) {
        return Produto::delete($_GET['delete']);
      } else {
        return Produto::selectAll();
      }
    }

    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Produto::insert($data);
    }

    public function put()
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Produto::update($data);
    }
 }
?>