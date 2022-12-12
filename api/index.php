<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: POST, PUT, DELETE");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
  require_once '../vendor/autoload.php';

  if ($_GET['url']) {
    $url = explode('/', $_GET['url']);
    $service = "";
    if ($url[0] === 'show') {
    
      var_dump("
      api/pessoa
        - Quando usado método GET, retorna a lista de pessoas.
        {
          'status': 'success',
          'data': [
              {
                  'id': id,
                  'nome': 'nome completo',
                  'cpfCnpj': 'CPF / CNPJ',
                  'idEndereco': idEndereco,
                  'email': 'email',
                  'senha': 'senha',
                  'tipo': 'tipo'
              }
          ]
        }
        - Quando usado método POST, recebe um JSON com os dados da pessoa a ser cadastrada.
        {
          'cpfCnpj': 'CPF / CNPJ',
          'email': 'email',
          'idEndereco': idEndereco,
          'nome': 'nome completo',
          'senha': 'senha'
        }

      api/pessoa?tipo=
        - Parametro tipo recebe como valor 'cliente' e 'usuario', sendo cada um responsável por filtrar as pessoas por tipo cliente e usuario.
        api/pessoa?tipo=cliente
        {
          'status': 'success',
          'data': [
              {
                  'id': id,
                  'nome': 'nome completo',
                  'cpfCnpj': 'CPF / CNPJ',
                  'idEndereco': idEndereco,
                  'email': 'email',
                  'senha': '00000000',
                  'tipo': 'cliente'
              }
          ]
        }
      api/pessoa?id=
        - Parametro id recebe o valor 'id' da pessoa que deseja consultar.
        api/pessoa?id=1
        {
          'status': 'success',
          'data': [
              {
                  'id': 1,
                  'nome': 'nome completo',
                  'cpfCnpj': 'CPF / CNPJ',
                  'idEndereco': idEndereco,
                  'email': 'email',
                  'senha': '00000000',
                  'tipo': 'tipo'
              }
          ]
        }
      api/pessoa?delete=
        - Parametro delete recebe o valor 'id' da pessoa que deseja excluir.
        api/pessoa?delete=1
        {
          'status': 'success / error',
          'data': 'mensagem'
        }
      api/pessoa?cpfCnpj= &senha=
        - Parametro cpfCnpj e senha recebem o 'cpfCnpj' e 'senha' respectivos da pessoa tipo 'usuario' para acesso ao sistema, retornando os dados do cadastro.
        api/pessoa?cpfCnpj=111.111.111-11&senha=abc123
        {
          'status': 'success',
          'data': [
              {
                  'id': 1,
                  'nome': 'nome completo',
                  'cpfCnpj': '111.111.111-11',
                  'email': 'email',
              }
          ]
        }
      api/updatepessoa
        - Endpoint responsável por fazer atualizações no cadastro da pessoa, enviada por JSON através do body (necessário ter o campo cpfCnpj no body para fazer a localização da pessoa e atualizaçao)
        api/updatepessoa
        {
          'cpfCnpj': '111.111.111-11',
          'senha': 'abc12345'
        }
      api/enderecopessoa
        - Quando usado o método GET, retorna a lista com todos os endereços cadastrados.
        api/enderecopessoa
        {
          'status': 'success',
          'data': [
              {
                  'id': id,
                  'cep': 'cep',
                  'logradouro': 'logradouro',
                  'numero': 'numero',
                  'bairro': 'bairro',
                  'cidade': 'cidade',
                  'estado': 'uf',
                  'complemento': 'complemento'
              }
          ]
        }
        - Quando usado o método POST, recebe um JSON com os dados do endereço a ser cadastrado.
        api/enderecopessoa
          {
            'cep': 'cep',
            'logradouro': 'logradouro',
            'numero': 'numero',
            'bairro': 'bairro',
            'cidade': 'cidade',
            'estado': 'uf',
            'complemento': 'complemento'
          }
      api/updateendereco
        - Quando usado o método POST, recebe um JSON com os dados do endereço a ser atualizado.
        api/updateendereco
          {
            'cep': 'cep',
            'logradouro': 'logradouro',
            'numero': 'numero',
            'bairro': 'bairro',
            'cidade': 'cidade',
            'estado': 'uf',
            'complemento': 'complemento'
          }
      api/produto
        - Quando usado o método GET, retorna a lista de produtos.
        - Quando usado o método POST, recebe um JSON com os dados do produto a ser cadastrado.
          {
            'nome': 'nome',
            'quantidade': 'quantidade',
            'preco': 'preco'
          }
      api/updateproduto
        - Quando usado o método POST, recebe um JSON com os dados do produto a ser atualizado.
          {
            'id': 'id'
            'nome': 'nome',
            'quantidade': 'quantidade',
            'preco': 'preco'
          }
      api/formapagamento
        - Quando usado o método GET, retorna a lista de formas de pagamento.
        {
          'data': [
              {
                  'id': 'id',
                  'nomePagamento': 'nomePagamento',
                  'parcela': 'parcela'
              }
          ]
        }
        - Quando usado o método POST, recebe um JSON com os dados a serem incluídos.
        {
          'nomePagamento': 'Dinheiro',
          'parcela': '1'
        }
      api/formapagamento?id=
        - Espera o identificador (id) do registro para consulta.
      api/updateformapagamento
        - Quando usado o método POST, recebe um JSON com os dados a serem atualizados.
        {
          'id': 'id',
          'nomePagamento': 'nomePagamento',
          'parcela': 'parcela'
        }
      ");
    } else {
      $service = 'App\Services\\'.ucfirst($url[0]).'Service';
      
      array_shift($url);

      $method = strtolower($_SERVER['REQUEST_METHOD']);

      try {
        $response = call_user_func_array(array(new $service, $method), $url);

        http_response_code(200);
        echo json_encode(array('status' => 'success', 'data' => $response));
        exit;
      } catch (\Exception $e) {
          http_response_code(404);
          echo json_encode(array('status' => 'error', 'data' => $e->getMessage()), JSON_UNESCAPED_UNICODE);
          exit;
      }
    }
  }