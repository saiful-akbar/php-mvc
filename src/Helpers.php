<?php

if (!function_exists('arrayToObject')) {

  /**
   * Merubah array menjadi object
   * 
   * @param mixed $array
   * 
   * @return mixed
   */
  function arrayToObject(mixed $array): mixed
  {
    if (is_array($array)) {
      return (object) array_map(__FUNCTION__, $array);
    }

    return trim($array);
  }
}

if (!function_exists('config')) {

  /**
   * Mengambil nilai pada konfigurasi
   * 
   * @param string $key [Gunakan tanda . atau / sebagai pemisah antara file dan key]
   * @param mixed|null $default
   * 
   * @return mixed
   */
  function config(string $key, mixed $default = null): mixed
  {
    $keys = trim($key, '/');
    $keys = str_replace('.', '/', $keys);
    $keys = explode('/', $keys);

    $config = require __DIR__ . "/../config/{$keys[0]}.php";
    unset($keys[0]);

    if ($config[$keys[1]]) return $config[$keys[1]];

    return $default;
  }
}

if (!function_exists('view')) {

  /**
   * Mengambil view
   * Lokasi file relatif terhadap folder /views
   * 
   * @param string $view
   * @param array $data
   * 
   * @return void
   */
  function view(string $view, array $data = []): mixed
  {
    $viewPath = str_replace('.', '/', $view);

    extract($data);

    return require __DIR__ . "/../views/{$viewPath}.php";
  }
}

if (!function_exists('layout')) {

  /**
   * Mengambil view layout
   * Lokasi file layouts relatif terhadap folder /views/layouts/*
   * 
   * @param string $layout
   * @param string $content
   * @param array $data
   * 
   * @return void
   */
  function layout(string $layout, string $content, array $data = []): mixed
  {
    $data['content'] = str_replace('.', '/', $content);

    return view($layout, $data);
  }
}

if (!function_exists('route')) {

  /**
   * Membuat full route url
   * 
   * @param string $path
   * @param array $params
   * 
   * @return string
   */
  function route(string $path, array $params = []): string
  {
    $baseUrl = config('app.url');
    $baseUrl = trim($baseUrl, '/');
    $baseUrl .= '/?route=' . trim($path, '/');

    if (count($params) > 0) {
      foreach ($params as $key => $value) {
        $baseUrl .= "&{$key}={$value}";
      }
    }

    return $baseUrl;
  }
}

if (!function_exists('isRoute')) {

  /**
   * Cek apakah route sesuai dengan yang di request atau tidak
   * 
   * @param string $path
   * @param string|null $default
   * 
   * @return bool
   */
  function isRoute(string $path, ?string $default = null): bool
  {
    $route = $_GET['route'] ?? '/';
    $path = trim($path, '/');

    if ($route != $path && !empty($default)) {
      return $route === $default;
    }

    return $route === $path;
  }
}

if (!function_exists('url')) {

  /**
   * Membuat full url
   * 
   * @param string $path
   * 
   * @return string
   */
  function url(string $path = '/', array $params = []): string
  {
    $url = trim(config('app.url'), '/');
    $url .= '/';
    $url .= trim($path, '/');

    // Cek params
    if (count($params) > 0) {
      $url .= '?';

      // Set query string
      foreach ($params as $key => $value) {
        $url .= "{$key}={$value}";

        if (array_key_last($params) !== $key) {
          $url .= "&";
        }
      }
    }

    return trim($url);
  }
}

if (!function_exists('e')) {
  /**
   * Clear print dengan htmlspecialchars
   * 
   * @param mixed $value
   * 
   * @return void
   */
  function e(mixed $value): void
  {
    echo htmlspecialchars(trim($value));
  }
}
