<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'birth' => '2021-04-18',
        'cpf' => '558.802.760-40',
        'phone' => '364.517.8510',
        'address' => '13108 Muller Extension Suite 468
        Oberbrunnerside, NV 31830',
        'password' => bcrypt('123456'),
        'access' => 1,
        'level' => 1,
        'uniqueCode' => 'zwSvz5kF89',
        'remember_token' => 'SA8u74QV3u'
       ]);

    }
}
