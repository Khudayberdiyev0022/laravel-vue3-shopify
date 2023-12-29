<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TranslationController extends Controller
{

  public function index(): View
  {
    $translations = Translation::all();

    return view('translations.index', compact('translations'));
  }

  public function create(): View
  {
    $translation = new Translation();

    return view('translations.create', compact('translation'));
  }

  public function store(Request $request): RedirectResponse
  {
//    dd($request->all());
    $data = $request->validate([
      'group'  => 'required|string|max:50|unique:translations,group',
      'key'    => 'required|string|max:50|unique:translations,key',
      'text'   => "required|array|exists:languages,id",
      'text.*' => 'required|string|max:255',
    ]);
    Translation::query()->create($data);

    return redirect()->route('translations.index');
  }

  public function show(Translation $translation): View
  {
    return view('translations.show', compact('translation'));
  }

  public function edit(Translation $translation): View
  {
    return view('translations.edit', compact('translation'));
  }

  public function update(Request $request, Translation $translation): RedirectResponse
  {
    $data = $request->validate([]);
    $translation->update($data);

    return redirect()->route('translations.index');
  }

  public function destroy(Translation $translation): RedirectResponse
  {
    $translation->delete();

    return redirect()->route('translations.index');
  }
}
