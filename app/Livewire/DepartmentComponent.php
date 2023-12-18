<?php

namespace App\Livewire;

use App\Models\Department;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DepartmentComponent extends Component
{
  public string|null $title_uz, $title_ru, $title_en, $title_ar, $phone, $email, $department_id;

  public function __construct()
  {
    $this->middleware('auth');
    $this->middleware('permission:department-create|department-edit|department-delete', ['only' => ['index','show']]);
    $this->middleware('permission:department-create', ['only' => ['create','store']]);
    $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
    $this->middleware('permission:department-delete', ['only' => ['destroy']]);
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
    'title_en' => 'nullable|string|max:255',
    'title_ar' => 'nullable|string|max:255',
    'phone'    => 'required|digits:10',
    'email'    => 'required|string|email',
  ])]
  public function create(): void
  {
    $department = new Department();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $data = $this->validate();
    Department::query()->create($data);
    session()->flash('success', 'New student has been added successfully');

    $this->close();
  }

  public function show(Department $department): void
  {
    $this->title_uz = $department->title_uz;
    $this->title_ru = $department->title_ru;
    $this->title_en = $department->title_en;
    $this->title_ar = $department->title_ar;
    $this->phone    = $department->phone;
    $this->email    = $department->email;

    $this->dispatch('show-view');
  }

  public function edit(Department $department): void
  {
    $this->department_id = $department->id;
    $this->title_uz      = $department->title_uz;
    $this->title_ru      = $department->title_ru;
    $this->title_en      = $department->title_en;
    $this->title_ar      = $department->title_ar;
    $this->phone         = $department->phone;
    $this->email         = $department->email;

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $data       = $this->validate();
    $department = Department::query()->findOrFail($this->department_id);
    $department->update($data);
    session()->flash('message', 'Student has been updated successfully');
    $this->dispatch('close-modal');
  }

  public function delete(Department $department): void
  {
    $this->department_id = $department->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $department = Department::query()->findOrFail($this->department_id);
    $department->delete();

    session()->flash('message', 'Student has been deleted successfully');

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru', 'title_en', 'title_ar', 'phone', 'email');
    $this->dispatch('close-modal');
  }


  public function render(): View
  {
    $departments = Department::query()->latest()->paginate(3);

    return view('livewire.department-component', compact('departments'));
  }
}
