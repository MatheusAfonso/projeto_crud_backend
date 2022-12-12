<?php
  namespace App\Services;

  use App\Models\EnderecoPessoa;

  class UpdateEnderecoService
  {
    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return EnderecoPessoa::update($data);
    }
  }