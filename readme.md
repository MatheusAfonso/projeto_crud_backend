Projeto Matheus Afonso

Itens utilizados:
    - PHP
    - MySql
    - Vue 2

Configuração do projeto:

Script para criar banco de dados e tabelas chama-se dataabse.sql.

Endpoints:
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

rodando em http://localhost/