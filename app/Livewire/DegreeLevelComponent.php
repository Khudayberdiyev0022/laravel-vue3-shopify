<?php

namespace App\Livewire;

use App\Models\DegreeLevel;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class DegreeLevelComponent extends Component
{
  use WithPagination;

  public ?string $title_uz, $title_ru, $degreelevel_id;

  public function render(): View
  {
    $degreelevels = DegreeLevel::query()->latest()->paginate(15);

    return view('livewire.degree-level-component', compact('degreelevels'));
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $degreelevel = new DegreeLevel();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data                = [];
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    DegreeLevel::query()->create($data);
    session()->flash('success',  __('main.success_degreelevel'));

    $this->close();
  }

  public function show(DegreeLevel $degreelevel): void
  {
    $json           = json_decode($degreelevel, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(DegreeLevel $degreelevel): void
  {
    $this->degreelevel_id = $degreelevel->id;
    $json           = json_decode($degreelevel, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $this->validate();
    $data                = [];
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    $degreelevel = DegreeLevel::query()->findOrFail($this->degreelevel_id);
    $degreelevel->update($data);
    session()->flash('updated',  __('main.updated_degreelevel'));
    $this->dispatch('close-modal');
  }

  public function delete(DegreeLevel $degreelevel): void
  {
    $this->degreelevel_id = $degreelevel->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $degreelevel = DegreeLevel::query()->findOrFail($this->degreelevel_id);
    $degreelevel->delete();

    session()->flash('deleted',  __('main.deleted_degreelevel'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
