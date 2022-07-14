<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Administrátor',
            'Organizátor',
            'Účetní'
        ];

        foreach($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }


        $permissions = [
            'Zobrazit uživatele',
            'Vytvořit uživatele',
            'Upravit uživatele',
            'Smazat uživatele',

            'Zobrazit uživatelské skupiny',
            'Vytvořit uživatelskou skupinu',
            'Upravit uživatelskou skupinu',
            'Smazat uživatelskou skupinu',

            'Vytvořit příspěvek',
            'Upravit příspěvek',
            'Smazat příspěvek',

            'Vytvořit stránku',
            'Upravit stránku',
            'Smazat stránku',

            'Zobrazit rezervace',
            'Upravit rezervaci',
            'Smazat rezervaci',
            'Nastavení rezervací',

            'Zobrazit kalendář',

            'Zobrazit kupóny',
            'Vytvořit kupón',
            'Upravit kupón',
            'Smazat kupón',

            'Zobrazit vozidla',
            'Vytvořit vozidlo',
            'Upravit vozidlo',
            'Smazat vozidlo',

            'Zobrazit kategorií vozidel',
            'Vytvořit kategorií vozidel',
            'Upravit kategorií vozidel',
            'Smazat kategorií vozidel',

            'Zobrazit atributy karavanů',
            'Vytvořit atribut karavnu',
            'Upravit atribut karavanu',
            'Smazat atribut karavanu',

            'Zobrazit příslušenství',
            'Vytvořit příslušenství',
            'Upravit příslušenství',
            'Smazat příslušenství',

            'Zobrazit sezóny',
            'Vytvořit sezóny',
            'Upravit sezóny',
            'Smazat sezóny',

            'Vytvořit často kladenou otázku',
            'Upravit často kladenou otázku',
            'Smazat často kladenou otázku',

            'Správa oznámení',

            'Správa slideru',

            'Zobrazit osobní data zákazníků',
        ];

        foreach($permissions as $permission) {
            $perm = Permission::create([
                'name' => $permission
            ]);

            foreach($roles as $role) {
                $role = Role::where('name', $role)->first();

                $role->givePermissionTo($perm);
            }
        }
    }
}
