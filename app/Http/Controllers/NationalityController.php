<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NationalityController extends Controller
{

  public function index(): View
  {
    $nationalities = Nationality::query()->latest()->get();

    return view('nationalities.index', compact('nationalities'));
  }

  public function create(): View
  {
    return view('nationalities.create');
  }

  public function store(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'title' => ['required', 'string', 'max:50'],
    ]);

    $data['type'] = 'custom';

    $nationality = Nationality::query()->create($data);

    return to_route('nationalities.show', $nationality);
  }

  public function show(Nationality $nationality): View
  {
    return view('nationalities.show', compact('nationality'));
  }

  public function destroy(Nationality $nationality): RedirectResponse
  {
    $nationality->delete();

    return to_route('nationalities.index');
  }
}
