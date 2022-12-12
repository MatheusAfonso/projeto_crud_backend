<?php
  namespace App\Services;

  use App\Models\EnderecoPessoa;

  class EnderecoPessoaService
  {
    public function get($id = null) 
    {
      if ($id) {
          return EnderecoPessoa::select($id);
      } else {
          return EnderecoPessoa::selectAll();
      }
    }

    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return EnderecoPessoa::insert($data);
    }
  }