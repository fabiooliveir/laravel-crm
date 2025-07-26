<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Webkul\User\Models\Role;
use Webkul\User\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pega as credenciais das variáveis de ambiente
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminName = env('ADMIN_NAME', 'Admin');
        $adminPassword = env('ADMIN_PASSWORD', 'admin123');

        // Verifica se o usuário administrador já existe
        if (! User::where('email', $adminEmail)->exists()) {
            // Busca a role de 'Administrator'
            $adminRole = Role::where('name', 'Administrator')->first();

            if ($adminRole) {
                // Cria o usuário administrador
                User::create([
                    'name'     => $adminName,
                    'email'    => $adminEmail,
                    'password' => Hash::make($adminPassword),
                    'role_id'  => $adminRole->id,
                    'status'   => 1,
                ]);
            }
        }
    }
}
