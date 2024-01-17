<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegionController extends Controller
{

  public function index(): View
  {
    $regions = Region::query()->latest()->get();

    return view('regions.index', compact('regions'));
  }

  public function create(): View
  {
    return view('regions.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'title' => ['required', 'string', 'max:50'],
    ]);


    $region = Region::query()->create($data);

    return to_route('regions.show', $region);
  }

  public function show(Region $region): View
  {
    return view('regions.show', compact('region'));
  }

  public function destroy(Region $region): RedirectResponse
  {
    $region->delete();

    return to_route('regions.index');
  }
}
