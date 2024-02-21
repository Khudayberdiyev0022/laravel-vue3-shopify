<?php

namespace App\Livewire;

use App\Models\Department;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class GroupComponent extends Component
{
  use WithPagination;

  public int     $type = 2;
  public ?string $title_uz, $title_ru, $group_id;

  public function render(): View
  {
    $groups = Department::query()->where('type', $this->type)->latest()->paginate(15);

    return view('livewire.group-component', compact('groups'));
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $group = new Department();

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
    session()->flash('success',  __('main.success_group'));

    $this->close();
  }

  public function show(Department $group): void
  {
    $json           = json_decode($group, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(Department $group): void
  {
    $this->group_id = $group->id;
    $json           = json_decode($group, true);
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
    $group = Department::query()->findOrFail($this->group_id);
    $group->update($data);
    session()->flash('updated',  __('main.updated_group'));
    $this->dispatch('close-modal');
  }

  public function delete(Department $group): void
  {
    $this->group_id = $group->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $group = Department::query()->findOrFail($this->group_id);
    $group->delete();

    session()->flash('deleted',  __('main.deleted_group'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
