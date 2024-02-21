<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChairController extends Controller
{

  public function index(): View
  {
    $chairs = Chair::all();

    return view('chairs.index', compact('chairs'));
  }

  public function create(): View
  {
    $chair = new Chair();

    return view('chairs.create', compact('chair'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'type'    => 'required|integer',
      'name'    => 'required',
      'content' => 'nullable',
      'abbr'    => 'required|string|unique:chairs,abbr',
    ]);

//    dd($data);

    Chair::query()->firstOrCreate($data);

    return redirect()->route('chairs.index');
  }

  public function edit(Chair $chair): View
  {
    return view('chairs.edit', compact('chair'));
  }


  public function update(Request $request, Chair $chair): RedirectResponse
  {
    $data = $request->validate([
      'type'    => 'required|integer',
      'name'    => 'required',
      'content' => 'nullable',
      'abbr'    => 'required|string|unique:chairs,abbr,'.$chair->id,
    ]);

//    dd($data);
    $chair->update($data);

    return redirect()->route('chairs.index');
  }

  public function destroy(Chair $chair): RedirectResponse
  {
    $chair->delete();

    return redirect()->route('chairs.index');
  }
}
