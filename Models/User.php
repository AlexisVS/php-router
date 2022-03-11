<?php

namespace Models;

use PDO;
use PDOException;
use PDOStatement;
use Source\Constant;
use stdClass;

class User extends Model
{
  protected string $table = 'users';
}
