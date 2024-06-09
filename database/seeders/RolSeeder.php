<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleTeacher = Role::create(['name' => 'Profesor']);
        $roleStudent = Role::create(['name' => 'Estudiante']);

        Permission::create(['name' => 'users.index'])->syncRoles([$roleAdmin, $roleTeacher, $roleStudent,]);
        Permission::create(['name' => 'users.create'])->syncRoles([$roleAdmin, $roleTeacher, $roleStudent,]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$roleAdmin, $roleTeacher, $roleStudent,]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$roleAdmin, $roleTeacher, $roleStudent,]);

        Permission::create(['name' => 'students.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'students.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'students.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'students.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'teachers.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'teachers.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'teachers.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'teachers.destroy'])->syncRoles([$roleAdmin]);
    }
}
