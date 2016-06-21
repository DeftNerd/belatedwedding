<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User;
      $user->name = 'Adam Brown';
      $user->email = 'adam@deftnerd.com';
      $user->password = bcrypt('password');
      $user->save();

      $user = new User;
      $user->name = 'Bethany Duke';
      $user->email = 'bmclyr@gmail.com';
      $user->password = bcrypt('password');
      $user->save();
    }
}
