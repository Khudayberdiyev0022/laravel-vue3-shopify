<?php

namespace App\Livewire;

use App\Models\Nationality;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class NationalityComponent extends Component
{
  use WithPagination;

  public ?string $title_uz, $title_ru, $nationality_id;

  public function render(): View
  {
    $nationalities = Nationality::query()->latest()->paginate(15);

    return view('livewire.nationality-component', compact('nationalities'));
  }

  #[Validate([
    'title_uz' => 'required|string|max:255',
    'title_ru' => 'nullable|string|max:255',
  ])]
  public function create(): void
  {
    $nationality = new Nationality();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data                = [];
    $data['title']['uz'] = $this->title_uz;
    $data['title']['ru'] = $this->title_ru;
//    dd($data);
    Nationality::query()->create($data);
    session()->flash('success', __('main.created_nationality'));

    $this->close();
  }

  public function show(Nationality $nationality): void
  {
    $json           = json_decode($nationality, true);
    $this->title_uz = $json['title']['uz'];
    $this->title_ru = $json['title']['ru'];
    $this->dispatch('show-view');
  }

  public function edit(Nationality $nationality): void
  {
    $this->nationality_id = $nationality->id;
    $json           = json_decode($nationality, true);
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
    $nationality = Nationality::query()->findOrFail($this->nationality_id);
    $nationality->update($data);
    session()->flash('updated',  __('main.updated_nationality'));
    $this->dispatch('close-modal');
  }

  public function delete(Nationality $nationality): void
  {
    $this->nationality_id = $nationality->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $nationality = Nationality::query()->findOrFail($this->nationality_id);
    $nationality->delete();

    session()->flash('deleted',  __('main.deleted_nationality'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('title_uz', 'title_ru');
    $this->dispatch('close-modal');
  }
}
