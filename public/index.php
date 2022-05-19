<?php

/**
 * Cek autoload composer
 */
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
  throw new Exception('Pleace run "composer install"', 1);
}

require_once __DIR__ . '/../vendor/autoload.php';

use Src\Http\Request;
use Src\Core\Application;

$app = new Application();
$app->routing();
