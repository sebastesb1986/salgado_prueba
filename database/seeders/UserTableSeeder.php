<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        User::truncate();

        $user = User::create([
            'name' => 'Sebaste',
            'email' => 'salgadosb1986@gmail.com',
            'password' => '12345678',
        ]);

        $user->profile()->create([

            'name' => 'Admin',
            'lastname' => 'Admon',
            'document' => '1111111111',
            'address' => 'calle admon',
            'phone' => '3175631600',
            
        ]);
    }
}
