<?php
  namespace App\Services;

  use App\Models\Produto;

  class UpdateProdutoService
  {
    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Produto::update($data);
    }
  }