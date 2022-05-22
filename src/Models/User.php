<?php

namespace Src\Models;

use Src\Database\DB;

/**
 * Model user class
 */
class User extends DB
{
  /**
   * Nama tabel
   * 
   * @var string
   */
  protected static $table = 'users';

  /**
   * Mengambil data sebagai object
   * 
   * @return array
   */
  public static function all(): array
  {
    return parent::table(self::$table)
      ->select()
      ->get();
  }
}
