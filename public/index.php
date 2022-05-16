<?php

/**
 * Cek autoload composer
 */
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
  throw new Exception('Pleace run "composer install"', 1);
}

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Src\Core\Application();
$app->routing();
