<?php
  namespace App\Services;

  use App\Models\FormaPagamento;

  class FormaPagamentoService
  {
    public function get() 
    {
      if ($_GET['id'] !== null) {
        return FormaPagamento::select($_GET['id']);
      } else if ($_GET['delete'] !== null) {
        return FormaPagamento::delete($_GET['delete']);
      } else {
        return FormaPagamento::selectAll();
      }
    }

    public function post() 
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return FormaPagamento::insert($data);
    }

    public function put()
    {
      $data = json_decode(file_get_contents("php://input"), true);
      return FormaPagamento::update($data);
    }
 }
?>