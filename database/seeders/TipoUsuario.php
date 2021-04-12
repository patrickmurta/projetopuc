<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_usuario')->insert(
            [
                ['descricao' => 'Administrador do sistema'],
                ['descricao' => 'Representante comercial'],
                ['descricao' => 'Assistente comercial'],
                ['descricao' => 'Gerente comercial'],
            ]
        );
    }
}
