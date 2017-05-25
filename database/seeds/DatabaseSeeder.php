<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
          'name' => 'Jyrone Parker',
          'email' => 'jyrone.parker@gmail.com',
          'password' => bcrypt('n1nt3nd0'),
          'type' => 'admin',
          'address' => '113 East Mason Ave'
        ]);
    }
}
