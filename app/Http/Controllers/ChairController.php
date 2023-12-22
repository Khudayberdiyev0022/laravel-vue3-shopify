<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChairController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $chairs = Chair::query()->paginate(15);

    return view('chairs.index', compact('chairs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('chairs.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate(['name' => 'required']);
    Chair::query()->firstOrCreate($data);

    return redirect()->route('chairs.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Chair $chair)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Chair $chair): View
  {
    return view('chairs.edit', compact('chair'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Chair $chair): RedirectResponse
  {
    $data = $request->validate(['name' => 'required']);
    $chair->update($data);

    return redirect()->route('chairs.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Chair $chair): RedirectResponse
  {
    $chair->delete();

    return redirect()->route('chairs.index');
  }
}
