<?php

namespace Models;

use PDO;
use PDOException;
use Source\Constant;

class Model
{
  protected static PDO $pdo;
  protected string $table;

  public function __construct()
  {
    try {
      static::$pdo = new PDO(
        'mysql:host=' . Constant::DB_HOST . ';dbname=' . Constant::DB_NAME,
        Constant::DB_USER,
        Constant::DB_PASSWORD,
        [
          // Faire en sorte que le resultat du query soit uun object ça permet d'utiliser les fleches
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
      );
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }

    $this->table = strtolower(explode('\\', get_class($this))[1] . 's');
  }

  public function all(): array
  {
    $statement = $this->getPDO()->query("SELECT * FROM {$this->table}");
    // var_dump($statement->fetchAll());
    return $statement->fetchAll();
  }

  protected function getPDO(): PDO
  {
    return static::$pdo;
  }
}
