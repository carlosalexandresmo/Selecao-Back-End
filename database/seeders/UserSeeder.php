<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
        User::create(
            [
                'name' => 'Usuário Administrador',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'role' => 'ADMIN',
            ]
        );
        User::create([
            'name' => 'Renan Manuel Gomes',
            'email' => 'renan.manuel.gomes@toyota.com.br',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Ana Juliana Juliana Rodrigues',
            'email' => 'anajulianarodrigues@ssala.com.br',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'name' => 'Emanuel Enrico Barros',
            'email' => 'emanuel.enrico.barros@oana.com.br',
            'password' => bcrypt('12345678'),
        ]);
    }
}
