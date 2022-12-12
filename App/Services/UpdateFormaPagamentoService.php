<?php
  namespace App\Services;

  use App\Models\FormaPagamento;

  class UpdateFormaPagamentoService
  {
    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return FormaPagamento::update($data);
    }
  }