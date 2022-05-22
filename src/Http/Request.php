<?php

namespace Src\Http;

/**
 * Http request core class
 */
class Request
{
  /**
   * Http method request
   * 
   * @var string
   */
  public string $method;

  /**
   * Http input request
   * 
   * @var object|null
   */
  public ?object $input = null;

  /**
   * Set method dan input
   */
  public function __construct()
  {
    // Set mthod
    $this->method = $_SERVER["REQUEST_METHOD"];

    // Set input
    $this->setInput();
  }

  /**
   * Set input properti
   * 
   * @return void
   */
  private function setInput(): void
  {
    if ($this->isGet()) {
      $this->input = arrayToObject($_GET);
    }

    if ($this->isPost()) {
      $this->input = arrayToObject($_POST);
    }
  }

  /**
   * Cek apakan http method bertipe GET
   * 
   * @return bool
   */
  public function isGet(): bool
  {
    return strtoupper($this->method) === "GET";
  }

  /**
   * Cek apakan http method bertipe POST
   * 
   * @return bool
   */
  public function isPost(): bool
  {
    return strtoupper($this->method) === "POST";
  }
}
