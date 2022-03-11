<?php

namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{
  // Toutes les routes
  private array $routes;

  /**
   * enregistre l'action de la route dans l'array route
   * 
   * @param string $path
   * @param callable|array $action
   *                                       
   * $array = ['controllers\HomeController', 'index']
   */
  public function register(string $path, callable|array $action): void
  {
    $this->routes[$path] = $action;
  }

  public function resolve(string $uri): mixed
  {
    // Prend l'uri avant une quelconque query string
    $path = explode('?', $uri)[0];

    // Enregistre l'action de la route en tant que action ou return null et cela va se finir sur une error
    $action = $this->routes[$path] ?? null;

    // Si l'action est callable return l'action
    if (is_callable($action)) {
      return $action();
    }

    // Si l'action est un tableau on enrregistre la premiere valeur en tant que class
    // et la deuxieme valeur en tant que methode
    if (is_array($action)) {
      [$className, $method] = $action;

      // si la class existe et que la methode dans la class existe ( en public d'ailleur )
      // on invoque la class et on return le return de la function de la class
      if (class_exists($className) && method_exists($className, $method)) {
        $class = new $className();

        // fonction bizarre qui permet en 2 valeur dans un tableau
        // d'appeler la classe et ensuite la methode $method
        return call_user_func_array([$class, $method], []);
      }
    }
    // aussi non ERROR
    return new RouteNotFoundException();
  }
}
