<?php

namespace Database\Seeders;

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
            'usuario' => 'Admin@admin',
            'password' => Hash::make('Ulili2007'),
        ])->syncRoles([1]);


        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'costa',
            'usuario' => 'Erick@capturista',
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([2]);

        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@alumno',
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@profesor',
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([4]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@verificador',
            'password' => Hash::make('Ulili2098'),
        ])->syncRoles([5]);



        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@1',
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@2',
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@3',
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@4',
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@5',
        ])->syncRoles([3]);
        User::create([
            'nombre' => 'Erick',
            'apelPat' =>  'Hernandez',
            'apelMat'=> 'Costa',
            'usuario' => 'Erick@6',
        ])->syncRoles([3]);

    }
}
