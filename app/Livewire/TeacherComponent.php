<?php

namespace App\Livewire;

use App\Models\Teacher;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherComponent extends Component
{
  use WithFileUploads;

  public string $teacher_id, $name, $surname, $middlename, $date_of_birth, $phone, $passport;
  public $image;

  #[Validate([
    'name'          => 'required|string',
    'surname'       => 'required|string',
    'middlename'    => 'required|string',
    'date_of_birth' => 'required|date',
    'phone'         => 'nullable|string',
    'passport'      => 'nullable|string',
    'image'         => 'nullable|image|mimes:png,jpeg,jpg',
  ])]
  public function render(): View
  {
    $teachers = Teacher::query()->latest()->paginate(15);

    return view('livewire.teacher-component', compact('teachers'));
  }

  public function create(): void
  {
    $teacher = new Teacher();

    $this->dispatch('show-create', compact('teacher'));
  }

  public function store(): void
  {
    $data          = $this->validate();
    $path          = $this->image->store('teachers', 'public');
    $data['image'] = 'storage/'.$path;

    Teacher::query()->firstOrCreate($data);
    session()->flash('success', 'New teacher has been added successfully');
    $this->close();
  }

  public function show(Teacher $teacher): void
  {
    $this->image         = $teacher->image;
    $this->name          = $teacher->name;
    $this->surname       = $teacher->surname;
    $this->middlename    = $teacher->middlename;
    $this->date_of_birth = $teacher->date_of_birth;
    $this->phone         = $teacher->phone;
    $this->passport      = $teacher->passport;
    $this->dispatch('show-view');
  }

  public function edit(Teacher $teacher): void
  {
    $this->teacher_id    = $teacher->id;
    $this->image         = $teacher->image;
    $this->name          = $teacher->name;
    $this->surname       = $teacher->surname;
    $this->middlename    = $teacher->middlename;
    $this->date_of_birth = $teacher->date_of_birth;
    $this->phone         = $teacher->phone;
    $this->passport      = $teacher->passport;

    $teacher = Teacher::query()->find($this->teacher_id);
    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $data    = $this->validate();
    $teacher = Teacher::query()->findOrFail($this->teacher_id);
    $teacher->update($data);
    session()->flash('message', 'Teacher has been updated successfully');
    $this->close();
  }

  public function delete(Teacher $teacher): void
  {
    $this->teacher_id = $teacher->id;

    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $teacher = Teacher::query()->findOrFail($this->teacher_id);
    $teacher->delete();

    session()->flash('message', 'Student has been deleted successfully');

    $this->close();
  }

  public function close(): void
  {
    $this->reset('name', 'surname', 'middlename', 'date_of_birth', 'phone', 'passport', 'image');
    $this->dispatch('close-modal');
  }
}
