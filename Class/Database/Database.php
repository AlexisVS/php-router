<?php

namespace Class\Database;

use PDO;

class Database
{

  public function __construct () {
    $database = new PDO('mysql:host=localhost; dbname=php_exo_pdo','root','root');
  }

  /**
   * Connection To DB
   */
  public function connexion() {
    $query = $this->database->query("SELECT * from users");
    return [$query];
  }
}
