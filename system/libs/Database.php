<?php

class Database extends PDO{

  public function __construct($dsn, $user, $pass){
   
    parent::__construct($dsn, $user, $pass);

  }
  
  Public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
    $stmt = $this->prepare($sql);
    foreach ($data as $key => $value){
      $stmt->bindParam($key, $value);
    }
    $stmt->execute();
    return $stmt->fetchAll($fetchStyle);
  }

  public function insert($table, $data){
    $keys   = implode(",", array_keys($data));
    $values = ":" .implode(", :", array_keys($data));

    $sql= "INSERT INTO $table($keys) VALUES($values)";
    $stmt = $this->prepare($sql);

    foreach ($data as $key => $value) {
      $stmt->bindParam(":$key", $value);
    }

     return $stmt->execute();
  }
  public function update($table, $data, $cond){
    $updateKeys = NULL; 
    foreach ($data as $key => $value){
      $updateKeys .= "$key=:$key";
    }
    $updateKeys = rtrim($updateKeys, ",");

    $sql = "UPDATE $table SET title=:title, name=:name Where $cond";
    $stmt = $this->prepare($sql);

    foreach ($data as $key => $value) {
    $stmt->bindParam("$key", $value);
}
    return $stmt->execute();
  }
    
}
?>