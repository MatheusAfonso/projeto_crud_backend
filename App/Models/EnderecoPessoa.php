<?php
  namespace App\Models;

  class EnderecoPessoa
  {
    private static $table = 'enderecoPessoa';

    public static function select(int $id) {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum endereço encontrado!");
      }
    }

    public static function selectAll() {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table;
      $stmt = $connPdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum endereço encontrado!");
      }
    }

    public static function insert($data)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'INSERT INTO '.self::$table.' (
              cep
              ,logradouro
              ,numero
              ,bairro
              ,cidade
              ,estado
              ,complemento
              ) VALUES (
              :cep
              ,:logradouro
              ,:numero
              ,:bairro
              ,:cidade
              ,:estado
              ,:complemento
              )';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':cep', $data['cep']);
      $stmt->bindValue(':logradouro', $data['logradouro']);
      $stmt->bindValue(':numero', $data['numero']);
      $stmt->bindValue(':bairro', $data['bairro']);
      $stmt->bindValue(':cidade', $data['cidade']);
      $stmt->bindValue(':estado', $data['estado']);
      $stmt->bindValue(':complemento', $data['complemento']);
        
      $stmt->execute();
      $lastId = $connPdo->lastInsertId();

      if ($stmt->rowCount() > 0) {
        return $lastId;
      } else {
        throw new \Exception("Falha ao inserir endereço!");
      }
    }

    public static function update($data)
    {
      $sqlUpdate = "";
      $where = ""; 

      foreach ($data as $fieldName => $fieldValue) {
        if ($fieldName === 'id') {
          $where = "$fieldName =  '" .$fieldValue."'";
        }
        if ($sqlUpdate > '') {
          $sqlUpdate .= ", ";
        }
        $sqlUpdate .= "$fieldName = '" .$fieldValue."'";
      }

      $sql ='UPDATE '.self::$table.' SET ' .$sqlUpdate. ' where '.$where;
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $stmt = $connPdo->prepare($sql);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        return 'Dados atualizados com sucesso!';
      } else {
        throw new \Exception("Falha ao inserir os dados!");
      }
    }
  }