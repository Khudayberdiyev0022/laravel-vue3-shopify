<?php

namespace App\Livewire;

use App\Models\Admission;
use App\Models\Chair;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ChairComponent extends Component
{

  public string $name, $chair_id;

  #[Validate([
    'name' => 'required|string|max:255',
  ])]
  public function render(): View
  {
    $chairs = Chair::query()->latest()->paginate(15);

    return view('livewire.chair-component', compact('chairs'));
  }

  public function create(): void
  {
    $chair = new Chair();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $data = $this->validate();
    Chair::query()->create($data);
    session()->flash('success', 'New student has been added successfully');
    $this->close();
  }

  public function show(Chair $chair): void
  {
    $this->name = $chair->name;

    $this->dispatch('show-view');
  }

  public function edit(Chair $chair): void
  {
    $this->chair_id = $chair->id;
    $this->name = $chair->name;
    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $data  = $this->validate();
    $chair = Chair::query()->findOrFail($this->chair_id);
    $chair->update($data);

    session()->flash('message', 'Chair has been updated successfully');

    $this->close();
  }

  public function delete(Chair $chair): void
  {
    $this->chair_id = $chair->id;

    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $chair = Chair::query()->findOrFail($this->chair_id);
    $chair->delete();

    session()->flash('message', 'Chair has been deleted successfully');

    $this->close();
  }


  public function close(): void
  {
    $this->reset('name');
    $this->dispatch('close-modal');
  }
}
