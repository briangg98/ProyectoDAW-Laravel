<?php

use Illuminate\Database\Seeder;
use App\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Enviar a tecnico',
            'project_id' => 1
        ]);

        Level::create([
            'name' => 'Enviar a Servidores',
            'project_id' => 1
        ]);

        Level::create([
            'name' => 'Seguridad Baja',
            'project_id' => 2
        ]);

        Level::create([
            'name' => 'Seguridad Alta',
            'project_id' => 2
        ]);

    }
}
