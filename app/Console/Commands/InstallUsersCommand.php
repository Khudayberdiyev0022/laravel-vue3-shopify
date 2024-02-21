<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class InstallUsersCommand extends Command
{

  protected $signature = 'install:users';

  protected $description = 'Command description';

  public function handle(): void
  {
    $this->installUsers();
    $this->info('Установка пользователей...');
  }

  private function installUsers(): void
  {
    $user = User::query()->create([
     'name'=> $this->ask('Enter name'),
     'email'=> $this->ask('Enter email'),
     'admin'=> $this->confirm('Is admin?'),
     'password'=> bcrypt($this->secret('Enter password')),
    ]);
    $this->warn("User created: {$user->name} ({$user->email})");

//    $users = [
//      [
//        'id'       => 1,
//        'name'     => 'Administrator',
//        'email'    => 'super@admin.com',
//        'admin'    => true,
//        'password' => bcrypt('secret'),
//      ],
//    ];
//    foreach ($users as $user) {
//      User::query()->upsert($user, 'id');
//    }
  }
}
