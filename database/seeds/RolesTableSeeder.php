<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $owner = new Role();
        $owner->name = 'owner';
        $owner->display_name = 'Mi2U';
        $owner->description = 'Super usuario administrador de todo el sistema'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Administrador'; // optional
        $admin->description = 'Usuario administrador de empresas'; // optional
        $admin->save();
    }

}
