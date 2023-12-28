<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LanguageController extends Controller
{



  public function index(): View
  {
    $languages = Language::all();

    return view('languages.index', compact('languages'));
  }

  public function create(): View
  {
    $language = new Language();

    return view('languages.create', compact('language'));
  }

  public function store(LanguageRequest $request): RedirectResponse
  {
    $data             = $request->validated();
    $data['active']   ??= false;
    $data['default']  ??= false;
    $data['fallback'] ??= false;

    Language::query()->firstOrCreate($data);

    return redirect()->route('languages.index');
  }

//  public function show(Language $language)
//  {
//    //
//  }

  public function edit(Language $language): View
  {
    return view('languages.edit', compact('language'));
  }

  public function update(LanguageRequest $request, Language $language): RedirectResponse
  {
    $data             = $request->validated();
    $data['active']   ??= false;
    $data['default']  ??= false;
    $data['fallback'] ??= false;

    $language->update($data);

    return redirect()->route('languages.index');
  }

  public function destroy(Language $language): RedirectResponse
  {
    $language->delete();

    return redirect()->route('languages.index');
  }
}
