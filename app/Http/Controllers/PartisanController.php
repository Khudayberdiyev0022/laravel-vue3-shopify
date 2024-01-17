<?php

namespace App\Http\Controllers;

use App\Models\Partisan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartisanController extends Controller
{

  public function index(): View
  {
    $partisans = Partisan::query()->latest()->get();

    return view('partisans.index', compact('partisans'));
  }

  public function create(): View
  {
    return view('partisans.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'title' => ['required', 'string', 'max:50'],
    ]);


    $partisan = Partisan::query()->create($data);

    return to_route('partisans.show', $partisan);
  }

  public function show(Partisan $partisan): View
  {
    return view('partisans.show', compact('partisan'));
  }

  public function destroy(Partisan $partisan): RedirectResponse
  {
    $partisan->delete();

    return to_route('partisans.index');
  }
}
