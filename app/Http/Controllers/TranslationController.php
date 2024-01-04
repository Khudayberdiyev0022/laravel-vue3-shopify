<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TranslationController extends Controller
{

  public function index(Request $request): View
  {

    $translations = Translation::query()->filter($request->all())->latest('id')->paginate(15);
//    dd($query->latest('id')->toSql());

    return view('translations.index', compact('translations'));
  }

  public function create(): View
  {
    $translation = new Translation();

    return view('translations.create', compact('translation'));
  }

  public function store(TranslationRequest $request): RedirectResponse
  {
//    dd($request->all());
    $data = $request->validated();
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

  public function update(TranslationRequest $request, Translation $translation): RedirectResponse
  {
    $data = $request->validated();
    $translation->update($data);

    return redirect()->route('translations.index');
  }

  public function destroy(Translation $translation): RedirectResponse
  {
    $translation->delete();

    return redirect()->route('translations.index');
  }
}
