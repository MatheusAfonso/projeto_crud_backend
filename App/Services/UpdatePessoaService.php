<?php
  namespace App\Services;

  use App\Models\Pessoa;

  class UpdatePessoaService
  {
    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return Pessoa::update($data);
    }
  }