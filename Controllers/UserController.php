<?php

namespace Controllers;

use Class\Database\Database;
use Models\User;
use PDO;
use Source\Renderer;

class UserController
{
  public function index() : Renderer
  {
    $users = new User();
    $data = [
      'users' => $users->all(),
    ];
    return Renderer::make('users/index', $data);
  }

  // public function store (): Renderer
  // {
  //   new Database();
  // }

    public function create() : Renderer
    {
      return Renderer::make('users/create');
    }

  public function store () {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($password)) {
      $db = new PDO('mysql:host=localhost;dbname=php_exo_pdo', 'root', 'root');

      $request = $db->prepare('INSERT INTO users(first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)');
      $request->bindValue(':first_name', $first_name);
      $request->bindValue(':last_name', $last_name);
      $request->bindValue(':email', $email);
      $request->bindValue(':password', $password);
      $result = $request->execute();

      echo !$result ? 'ya eu un probleme chef' : 'request validated';

      return Renderer::make('/users/index');
    }
  }
}
