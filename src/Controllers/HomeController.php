<?php

use Src\Core\Controller;
use Src\Http\Request;

class HomeController extends Controller
{
  /**
   * View home page
   * 
   * @return
   */
  public function index(Request $request): mixed
  {
    return layout('app', 'home', ['title' => 'Home']);
  }
}
