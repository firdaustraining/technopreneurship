<?php
use App\User;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $user = User::create([
            'name'      => 'Firdaus Cogan',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password')
        ]);

    }
}
