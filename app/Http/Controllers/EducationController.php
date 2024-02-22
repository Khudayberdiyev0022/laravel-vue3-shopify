<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EducationController extends Controller
{
  public function index(): View
  {
    return view('education.index');
  }
}
