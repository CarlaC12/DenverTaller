<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreaSeeder::class);
        $this->call(EdadSeeder::class);
        $this->call(EscalaSeeder::class);
        $this->call(PermissionSeeder::class);
       $this->call(InfanteSeeder::class);
        $this->call(denverEscalaSeeder::class);


        $this->call(PreguntaALSeeder::class);
        $this->call(PreguntaMFASeeder::class);
        $this->call(PreguntaMGSeeder::class);
        $this->call(PreguntaPSSeeder::class);    
      
      }
}
