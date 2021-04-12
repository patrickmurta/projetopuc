<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class addUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        DB::table('users')->insert(
            [
                'name'              => 'ADM',
                'email'             => 'teste@teste.com.br',
                'password'          => bcrypt('12345678'),
                'tipo_usuario_id'   => 1,
                'provider'          => 1,
                'provider_id'        => 1
            ]
        );
    }
}
