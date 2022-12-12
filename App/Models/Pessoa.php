<?php
  namespace App\Models;

  class Pessoa
  {
    private static $table = 'pessoa';
    
    
    public static function select(string $cpfCnpj, string $senha)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' WHERE cpfCnpj = :cpfCnpj AND senha = :senha AND tipo = "usuario"';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':cpfCnpj', $cpfCnpj);
      $stmt->bindValue(':senha', $senha);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado! ");
      }
    }

    public static function selectAllFiltered(string $tipo)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      if($tipo === 'cliente') {
        $sql = 'SELECT id, nome, cpfCnpj, email FROM '.self::$table.' where tipo = :tipo';
      } else {
        $sql = 'SELECT * FROM '.self::$table.' where tipo = :tipo';
      }
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':tipo', $tipo);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado!");
      }
    }

    public static function selectById(string $id) {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);

      $sql = 'SELECT id, nome, cpfCnpj, email, idEndereco, tipo FROM '.self::$table.' where id = :id';      
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado!");
      }
    }

    public static function selectAll()
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table;
      $stmt = $connPdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado!");
      }
    }

    public static function insert($data)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'INSERT INTO '.self::$table.' (nome
                                           ,cpfCnpj
                                           ,idEndereco
                                           ,email
                                           ,senha
                                           ,tipo) VALUES (
                                             :nome
                                           ,:cpfCnpj
                                           ,:idEndereco
                                           ,:email
                                           ,:senha
                                           ,:tipo)';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':nome', $data['nome']);
      $stmt->bindValue(':cpfCnpj', $data['cpfCnpj']);
      $stmt->bindValue(':idEndereco', $data['idEndereco']);
      $stmt->bindValue(':email', $data['email']);
      $stmt->bindValue(':senha', $data['senha']);
      $stmt->bindValue(':tipo', $data['tipo']);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return 'Dados cadastrados com sucesso!';
      } else {
        throw new \Exception("Falha ao inserir os dados!");
      }
    }

    public static function update($data)
    {
      $sqlUpdate = "";
      $where = "";
        
      foreach ($data as $fieldName => $fieldValue) {
        if ($fieldName === 'cpfCnpj') {
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

    public static function delete($id)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'DELETE FROM '.self::$table.' WHERE id = :id';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':id', $id);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nada a ser excluído ");
      }
    }
  }