<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdmissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $admissions = Admission::query()->latest()->paginate(3);
//    dd($admissions);
    return view('admissions.index', compact('admissions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
//    dd($request->all());
    $data = $request->validate([
      'year'       => 'required|digits:4|integer|min:1900|max:'.(date('Y') + 1),
      'start_date' => 'required|date',
      'end_date'   => 'required|date',
    ]);
//    dd($data);
    Admission::query()->create($data);

    return redirect()->route('admissions.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Admission $admission)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Admission $admission)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Admission $admission)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Admission $admission)
  {
    //
  }
}
