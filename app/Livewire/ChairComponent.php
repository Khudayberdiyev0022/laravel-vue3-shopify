<?php

namespace App\Livewire;

use App\Models\Department;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class ChairComponent extends Component
{
  use WithPagination;

  public int     $type = 1;
  public ?string $title_uz, $title_ru, $chair_id;

  public function render(): View
  {
    $chairs = Department::query()->where('type', $this->type)->latest()->paginate(15);

    return view('livewire.chair-component', compact('chairs'));
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $chair = new Department();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data                = [];
    $data['type']        = $this->type;
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    Department::query()->create($data);
    session()->flash('success',  __('main.success_region'));

    $this->close();
  }

  public function show(Department $chair): void
  {
    $json           = json_decode($chair, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(Department $chair): void
  {
    $this->chair_id = $chair->id;
    $json           = json_decode($chair, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $this->validate();
    $data                = [];
    $data['type']        = $this->type;
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    $chair = Department::query()->findOrFail($this->chair_id);
    $chair->update($data);
    session()->flash('updated',  __('main.updated_region'));
    $this->dispatch('close-modal');
  }

  public function delete(Department $chair): void
  {
    $this->chair_id = $chair->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $chair = Department::query()->findOrFail($this->chair_id);
    $chair->delete();

    session()->flash('deleted',  __('main.deleted_region'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
