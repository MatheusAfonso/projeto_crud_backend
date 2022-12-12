<?php
  namespace App\Models;

  class FormaPagamento
  {
    private static $table = 'formaPagamento';
    
    
    public static function select(string $id)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id ORDER BY nomePagamento ASC';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':id', $id);

      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetch(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhuma forma de pagamento encontrada! ");
      }
    }
  
    public static function selectAll()
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'SELECT * FROM '.self::$table.' ORDER BY nomePagamento ASC';
      $stmt = $connPdo->prepare($sql);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
      } else {
        throw new \Exception("Nenhuma forma de pagamento encontrada!");
      }
    }

    public static function insert($data)
    {
      $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; port='.DBPORT.'; dbname='.DBNAME, DBUSER, DBPASS);
      $sql = 'INSERT INTO '.self::$table.' (nomePagamento
                                           ,parcela
                                           ) VALUES (
                                            :nomePagamento
                                           ,:parcela
                                           )';
      $stmt = $connPdo->prepare($sql);
      $stmt->bindValue(':nomePagamento', $data['nomePagamento']);
      $stmt->bindValue(':parcela', $data['parcela']);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return 'Forma de pagamento cadastrada com sucesso!';
      } else {
        throw new \Exception("Falha ao cadastrar a forma de pagamento!");
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
        return 'Forma de pagamento atualizada com sucesso!';
      } else {
        throw new \Exception("Falha ao atualizar a forma de pagamento!");
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