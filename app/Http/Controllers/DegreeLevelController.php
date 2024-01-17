<?php

namespace App\Http\Controllers;

use App\Models\DegreeLevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DegreeLevelController extends Controller
{

  public function index(): View
  {
    $degreelevels = DegreeLevel::query()->latest()->get();

    return view('degreelevels.index', compact('degreelevels'));
  }

  public function create(): View
  {
    return view('degreelevels.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'title' => ['required', 'string', 'max:50'],
    ]);


    $degreelevel = DegreeLevel::query()->create($data);

    return to_route('degreelevels.show', $degreelevel);
  }

  public function show(DegreeLevel $degreelevel): View
  {
    return view('degreelevels.show', compact('degreelevel'));
  }

  public function destroy(DegreeLevel $degreelevel): RedirectResponse
  {
    $degreelevel->delete();

    return to_route('degreelevels.index');
  }
}
