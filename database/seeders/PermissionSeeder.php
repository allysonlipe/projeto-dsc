<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'curso_listar']);
        Permission::create(['name' => 'curso_cadastrar']);
        Permission::create(['name' => 'curso_alterar']);
        Permission::create(['name' => 'curso_deletar']);
    }
}
