<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Admin::create([
            'name'      => 'Admin',
            'lastname' => 'Doe',
            'email'     => 'test@test.com',
            'password'     => Hash::make('12345678'),

        ]);
        //factory(App\Admin::class)->create(10);
    }
}
