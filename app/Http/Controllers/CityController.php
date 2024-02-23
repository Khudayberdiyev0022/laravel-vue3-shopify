<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{

  public function index(): View
  {
    try {
      $this->authorize('view', City::class);
    } catch (AuthorizationException $e) {
      abort(403, $e->getMessage());
    }
    $cities = City::query()->with('region')->latest()->get();

    return view('cities.index', compact('cities'));
  }

  public function create(): View
  {
    try {
      $this->authorize('create', City::class);
    } catch (AuthorizationException $e) {
      abort(403, $e->getMessage());
    }

    return view('cities.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $this->authorize('create', City::class);
    $data = $request->validate([
      'title' => ['required', 'string', 'max:50'],
    ]);

    $city = City::query()->create($data);
    session()->flash('success', __('main.success_city'));

    return to_route('cities.show', $city);
  }

  public function show(City $city): View
  {
    try {
      $this->authorize('view', City::class);
    } catch (AuthorizationException $e) {
      abort(403, $e->getMessage());
    }

    return view('cities.show', compact('city'));
  }

  public function delete(City $city): RedirectResponse
  {
    try {
      $this->authorize('destroy', City::class);
    } catch (AuthorizationException $e) {
      abort(403, $e->getMessage());
    }
    $city->delete();
    session()->flash('deleted', __('main.deleted_city'));

    return to_route('cities.index');
  }
}
