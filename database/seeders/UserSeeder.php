<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Ange DEGO',
                'pseudo' => 'Ange96',
                'phone' => '98741253',
                'email' => 'ange96@gmail.com',
                'city' => 'Cotonou',
                'role' => 'gyneco',
                'work' => 'Génycoloque Andrologue',
                'password' => Hash::make('admin01'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'name' => 'Ruth BANGA',
                'pseudo' => 'Ruth01',
                'phone' => '99874123',
                'email' => 'ruth01@gmail.com',
                'city' => 'Cotonou',
                'work' => 'Andrologue',
                'role' => 'gyneco',
                'password' => Hash::make('admin01'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
            [
                'name' => 'Pierre NAGO',
                'pseudo' => 'Pierre03',
                'phone' => '62145879',
                'email' => 'pierre03@gmail.com',
                'city' => 'Cotonou',
                'work' => 'Génycoloque',
                'role' => 'teach',
                'password' => Hash::make('admin01'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime(),
            ],
        ]);
    }
}
