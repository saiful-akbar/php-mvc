<?php

namespace Src\Core;

use Src\Http\Request;

/**
 * Application core class
 */
class Application
{
  /**
   * Default controller
   * 
   * @var string
   */
  private string|object $controller = 'HomeController';

  /**
   * Default method
   * 
   * @var string
   */
  private string $method = 'index';

  /**
   * Default params
   * 
   * @var array
   */
  private array|object $params = [];

  /**
   * Default route
   * 
   * @var string|array
   */
  private string|array $route = 'home/index';

  /**
   * Set controller
   * 
   * @param string $controller
   * 
   * @return void
   */
  private function setController(string $controller): void
  {
    $controller = trim(ucfirst($controller)) . 'Controller';

    // Cek controller ada atau tidak
    if (file_exists(__DIR__ . "/../Controllers/{$controller}.php")) {
      $this->controller = $controller;
    }

    require_once __DIR__ . "/../Controllers/{$this->controller}.php";

    $this->controller = new $this->controller;
  }

  /**
   * Set mthod pada controller
   * 
   * @param string $method
   * 
   * @return void
   */
  private function setMethod(string $method): void
  {
    if (method_exists($this->controller, $method)) {
      $this->method = $method;
    }
  }

  /**
   * Set parameter pada method
   * 
   * @param array $params
   * 
   * @return void
   */
  private function setParams(array $params = []): void
  {
    if (!empty($params)) {
      $this->params = $params;
    }
  }

  /**
   * Buat routing aplikasi
   * 
   * @return void
   */
  public function routing(): void
  {
    // Ambil dan set route dari url
    if (isset($_GET['route']) && !empty($_GET['route'])) {
      $this->route = $_GET['route'];
    }

    // bersihkan route
    $this->route = trim($this->route, '/');
    $this->route = filter_var($this->route, FILTER_SANITIZE_URL);

    // Ubah route menjadi array
    $this->route = explode('/', $this->route);

    // Set controller
    $this->setController($this->route[0]);
    unset($this->route[0]);

    // Set method
    $this->setMethod($this->route[1]);
    unset($this->route[1]);

    // Set parameter
    // $this->setParams(array_values($this->route));
    // unset($this->route);

    // Jalankan controller & method setrta kirimkan parameter-nya jika ada.
    call_user_func([$this->controller, $this->method], new Request());
  }
}
