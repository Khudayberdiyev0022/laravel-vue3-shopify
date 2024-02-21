<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\DepartmentType;
use App\Models\Position;
use Illuminate\View\View;
use Livewire\Component;

class DepartmentPositionSelect extends Component
{
  public string $selectedDepartment = '';
  public mixed  $departments, $positions;

  public function mount(): void
  {
//    $this->types       = DepartmentType::all();
    $this->departments = Department::query()->where('type', false)->get();
    $this->positions   = collect();
  }

  public function render(): View
  {
    return view('livewire.department-position-select');
  }

  public function updatedSelectedDepartment($department): void
  {
    if (!is_null($department)) {
      $this->positions = Position::query()->where('department_id', $department)->get();
    }
  }
}
