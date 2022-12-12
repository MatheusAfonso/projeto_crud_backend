<?php
  namespace App\Models;

  class Produto
  {
    private static $table = 'produto';
    
    
    public static function select(string $id)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id ORDER BY nome ASC';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':id', $id);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum usuário encontrado! ");
      }
    }
  
    public static function selectAll()
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' ORDER BY nome ASC';
      $stmt = $connPdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhum produto encontrado!");
      }
    }

    public static function insert($data)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'INSERT INTO '.self::$table.' (nome
                                           ,quantidade
                                           ,preco
                                           ) VALUES (
                                            :nome
                                           ,:quantidade
                                           ,:preco
                                           )';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':nome', $data['nome']);
      $stmt->bindValue(':quantidade', $data['quantidade']);
      $stmt->bindValue(':preco', $data['preco']);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return 'Produto cadastrado com sucesso!';
      } else {
        throw new \Exception("Falha ao cadastrar o produto!");
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
        return 'Produto atualizado com sucesso!';
      } else {
        throw new \Exception("Falha ao atualizar o produto!");
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