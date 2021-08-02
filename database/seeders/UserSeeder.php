<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        //
        User::create([
            'nombre' => 'Admin',
            'apelPat' =>  'Admin',
            'apelMat'=> 'Admin',
            'usuario' => 'Admin@adm00', 
            'password' => Hash::make('Ulili2007'),
        ])->syncRoles([1]);

        User::create([
            'nombre' => 'inicio',
            'apelPat' =>  'inicio',
            'apelMat'=> 'inicio',
            'usuario' => Helper::userGenerator(new User,'usuario',2,'USR'),
            'estatus' => '0', 
        ]);

        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'costa',
            'usuario' => Helper::userGenerator(new User,'usuario',2,'USR'),
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([2]);

        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => Helper::userGenerator(new User,'usuario',2,'USR'),
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => Helper::userGenerator(new User,'usuario',2,'USR'),
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([4]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => Helper::userGenerator(new User,'usuario',2,'USR'),
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([5]);

    }
}
