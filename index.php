<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

/**
 * File ini memungkinkan kita untuk meniru fungsionalitas "mod_rewrite"...
 * ...Apache dari server web PHP bawaan.
 */
if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';
