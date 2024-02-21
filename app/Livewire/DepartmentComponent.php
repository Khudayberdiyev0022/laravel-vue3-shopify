<?php

namespace App\Livewire;

use App\Models\Department;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentComponent extends Component
{
  use WithPagination;

  public int $type = 0;
  public ?string $title_uz, $title_ru, $department_id;

  public function render(): View
  {
    $departments = Department::query()->with('positions')->where('type', $this->type)->latest()->paginate(15);

    return view('livewire.department-component', compact('departments'));
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $department = new Department();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data                = [];
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    Department::query()->create($data);
    session()->flash('success',  __('main.success_department'));

    $this->close();
  }

  public function show(Department $department): void
  {
    $json           = json_decode($department, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(Department $department): void
  {
    $this->department_id = $department->id;
    $json                = json_decode($department, true);
    $this->title_uz      = $json['title']['uz'];
    $this->title_ru      = $json['title']['ru'];

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $this->validate();
    $data                = [];
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    $department = Department::query()->findOrFail($this->department_id);
    $department->update($data);
    session()->flash('updated',  __('main.updated_department'));
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

    session()->flash('deleted',  __('main.deleted_department'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
