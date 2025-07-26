<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Webkul\Installer\Database\Seeders\DatabaseSeeder as InstallerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InstallerSeeder::class);
        
        // CORREÇÃO: Adiciona a chamada para o seeder do usuário administrador
        $this->call(AdminUserSeeder::class);
    }
}