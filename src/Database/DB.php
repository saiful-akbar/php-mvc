<?php

namespace Src\Database;

use Src\Database\QueryBuilder;

/**
 * Database DB class
 */
class DB
{
  /**
   * SQL Query builder
   * 
   * @var QueryBuilder|null|null
   */
  public static ?QueryBuilder $builder = null;

  /**
   * Constructor
   */
  function __construct()
  {
    self::setBuilder();
  }

  /**
   * Set properti builder dengan class QueryBuilder
   * 
   * @return QueryBuilder
   */
  protected static function setBuilder(): QueryBuilder
  {
    if (is_null(self::$builder)) {
      self::$builder = new QueryBuilder();
    }

    return self::$builder;
  }

  /**
   * Set tabel database
   * 
   * @param string $table
   * 
   * @return QueryBuilder
   */
  public static function table(string $table): QueryBuilder
  {
    self::setBuilder();
    self::$builder->table($table);

    return self::$builder;
  }

  /**
   * Membuat sql transaction
   * 
   * @param callable $action
   * 
   * @return void
   */
  public static function beginTransaction(callable $action)
  {
    self::setBuilder();
    self::$builder->beginTransaction();

    try {
      $action();
      self::$builder->commit();
    } catch (\PDOException $e) {
      self::$builder->rollback();
      throw $e->getMessage();
    }
  }
}
