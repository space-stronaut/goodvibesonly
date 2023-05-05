<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt(123456),
            'role' => 'customer',
            'no_hp' => '089501860577',
            'alamat' => 'Subang'
        ]);
    }
}
