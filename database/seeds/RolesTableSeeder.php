<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                "name" => "Admin", 
                "guard_name" => "web"
            ],
            [
                "name" => "Techinician", 
                "guard_name" => "web"
            ],
            [
                "name" => "Atendee", 
                "guard_name" => "web"
            ]
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
