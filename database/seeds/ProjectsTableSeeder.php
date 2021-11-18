<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Frontend Pagina Web',
            'description' => 'Creacion del frontend de la pagina web.'
        ]);

        Project::create([
            'name' => 'Backend Pagina Web',
            'description' => 'Creacion del backend de la pagina web.'
        ]);
    }
}
