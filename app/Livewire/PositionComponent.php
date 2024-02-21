<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Position;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class PositionComponent extends Component
{
  use WithPagination;

  public int     $department_id;
  public ?string $title_uz, $title_ru, $position_id;

  public function render(): View
  {
    $positions   = Position::query()->with('department')->latest()->paginate(15);
    $departments = Department::query()->where('type', false)->get();


    return view('livewire.position-component', compact('positions', 'departments'));
  }

  #[Validate([
    'department_id' => 'required|exists:departments,id',
    'title_uz'      => 'required|string|max:255',
    'title_ru'      => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data                  = [];
    $data['department_id'] = $this->department_id;
    $data['title']['uz']   = $this->title_uz;
    $data['title']['ru']   = $this->title_ru;
//    dd($data);
    Position::query()->create($data);
    session()->flash('success',  __('main.success_position'));

    $this->close();
  }

  public function show(Position $position): void
  {
    $json           = json_decode($position, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(Position $position): void
  {
    $this->position_id   = $position->id;
    $this->department_id = $position->department_id;
    $json                = json_decode($position, true);
    $this->title_uz      = $json['title']['uz'];
    $this->title_ru      = $json['title']['ru'];

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $this->validate();
    $data                  = [];
    $data['department_id'] = $this->department_id;
    $data['title']['uz']   = $this->title_uz;
    $data['title']['ru']   = $this->title_ru;
//    dd($data);
    $position = Position::query()->findOrFail($this->position_id);
    $position->update($data);
    session()->flash('updated',  __('main.updated_position'));
    $this->dispatch('close-modal');
  }

  public function delete(Position $position): void
  {
    $this->position_id = $position->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $position = Position::query()->findOrFail($this->position_id);
    $position->delete();

    session()->flash('deleted',  __('main.deleted_position'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
