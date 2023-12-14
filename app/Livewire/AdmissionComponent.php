<?php

namespace App\Livewire;

use App\Models\Admission;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class AdmissionComponent extends Component
{
  use WithPagination;

  public string $year, $start_date, $end_date, $admission_id;

  #[Validate([
    'year'       => 'required|digits:4|integer|min:2020|max:2030',
    'start_date' => 'required|date',
    'end_date'   => 'required|date',
  ])]
  public function create(): void
  {
    $admission = new Admission();
    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $data = $this->validate();
    Admission::query()->create($data);
    session()->flash('success', 'New student has been added successfully');
    $this->close();
  }

  public function show(Admission $admission): void
  {
    $this->year       = $admission->year;
    $this->start_date = $admission->start_date;
    $this->end_date   = $admission->end_date;

    $this->dispatch('show-view');
  }

  public function edit(Admission $admission): void
  {
//    $admission          = Admission::query()->findOrFail($id);
    $this->admission_id = $admission->id;
    $this->year         = $admission->year;
    $this->start_date   = $admission->start_date;
    $this->end_date     = $admission->end_date;

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $data      = $this->validate();
    $admission = Admission::query()->findOrFail($this->admission_id);
    $admission->update($data);

    session()->flash('message', 'Student has been updated successfully');

    $this->close();
  }

  public function delete(Admission $admission): void
  {
    $this->admission_id = $admission->id;

    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $admission = Admission::query()->findOrFail($this->admission_id);
    $admission->delete();

    session()->flash('message', 'Student has been deleted successfully');

    $this->close();
  }


  public function close(): void
  {
    $this->reset('year', 'start_date', 'end_date');
    $this->dispatch('close-modal');
  }

  public function render(): View
  {
    $admissions = Admission::query()->latest()->paginate(15);

    return view('livewire.admission-component', compact('admissions'));
  }
}
