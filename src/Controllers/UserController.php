<?php

use Src\Core\Controller;
use Src\Http\Request;

class UserController extends Controller
{
  public function index(Request $request)
  {
    return view('user', ['title' => 'User']);
  }
}
