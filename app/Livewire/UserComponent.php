<?php

namespace App\Livewire;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
  use WithPagination;

  public $roles         = [];
  public $selectedRoles = [];
  public ?string $name_uz, $name_ru, $email, $password, $user_id;

  public function mount()
  {
    $this->roles = Role::query()->get();
  }

  public function render(): View
  {
    $users = User::query()->latest()->paginate(5);

    return view('livewire.user-component', compact('users'));
  }

  #[Validate([
    'name_uz'  => ['required', 'string', 'max:50'],
    'name_ru'  => ['nullable', 'string', 'max:50'],
    'email'    => ['required', 'string', 'max:50', 'email'],
    'password' => ['nullable', 'string', 'max:50'],
    'roles'    => ['required'],
  ])]
  public function create(): void
  {
    $user = new User();

    $this->dispatch('show-create');
  }

  public function store(): void
  {
    $this->validate();
    $data               = [];
    $data['name']['uz'] = $this->name_uz;
    $data['name']['ru'] = $this->name_ru;
    $data['email']      = $this->email;
    $data['password']   = bcrypt($this->password);
    $data['roles']      = $this->selectedRoles;
    dd($data);
    User::query()->create($data);
    session()->flash('success', __('main.success_user'));

    $this->close();
  }

  public function show(User $user): void
  {
    $json          = json_decode($user, true);
    $this->name_uz = $json['name']['uz'];
    $this->name_ru = $json['name']['ru'];
    $this->email   = $user->email;
    $this->dispatch('show-view');
  }

  public function edit(User $user): void
  {
    $this->user_id = $user->id;
    $json          = json_decode($user, true);
    $this->name_uz = $json['name']['uz'];
    $this->name_ru = $json['name']['ru'];
    $this->email   = $user->email;

    $this->dispatch('show-edit');
  }

  public function update(): void
  {
    $this->validate();
    $data               = [];
    $data['name']['uz'] = $this->name_uz;
    $data['name']['ru'] = $this->name_ru;
    $data['email']      = $this->email;
    $data['password']   = $this->password;

    $user = User::query()->findOrFail($this->user_id);
    $user->update($data);
    session()->flash('updated', __('main.updated_user'));
    $this->dispatch('close-modal');
  }

  public function delete(User $user): void
  {
    $this->user_id = $user->id;
    $this->dispatch('show-delete');
  }

  public function deleteConfirm(): void
  {
    $user = User::query()->findOrFail($this->user_id);
    $user->delete();

    session()->flash('deleted', __('main.deleted_user'));

    $this->close();
  }

  public function close(): void
  {
    $this->reset('name_uz', 'name_ru', 'email', 'password',);
    $this->dispatch('close-modal');
  }
}
