<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FacultyController extends Controller
{

  public function index(): View
  {
    $faculties = Faculty::all();

    return view('faculties.index', compact('faculties'));
  }

  public function create(): View
  {
    $faculty = new Faculty();

    return view('faculties.create', compact('faculty'));
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
      'abbr'    => 'required|string|unique:faculties,abbr',
    ]);

//    dd($data);

    Faculty::query()->firstOrCreate($data);

    return redirect()->route('faculties.index');
  }

  public function edit(Faculty $faculty): View
  {
    return view('faculties.edit', compact('faculty'));
  }


  public function update(Request $request, Faculty $faculty): RedirectResponse
  {
    $data = $request->validate([
      'type'    => 'required|integer',
      'name'    => 'required',
      'content' => 'nullable',
      'abbr'    => 'required|string|unique:faculties,abbr,'.$faculty->id,
    ]);

//    dd($data);
    $faculty->update($data);

    return redirect()->route('faculties.index');
  }

  public function destroy(Faculty $faculty): RedirectResponse
  {
    $faculty->delete();

    return redirect()->route('faculties.index');
  }
}
