<?php

namespace Src\Views;

/**
 * HeaderView class
 */
class Header
{
  /**
   * Render view html
   * 
   * @return mixed
   */
  public static function render(): mixed
  {
    return view('components/header');
  }
}
