<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => '4WORKS',
            'last_name' => 'Solutions',
            'email' => 'vojacek@4ws.cz',
            'birthdate' => '2021-01-01',
            'phone' => '727806465',
            'address' => 'Poděbradská 520/24',
            'city' => 'Praha 9',
            'zip' => '19000',
            'company' => '4WORKS Solutions s.r.o.',
            'ico' => '02674947',
            'dic' => 'CZ02674947',
            'password' => bcrypt('vladciprahy'),
            'verified' => 1,
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name' => 'Martin',
            'last_name' => 'Zoch',
            'email' => 'zoch@zasilka.com',
            'birthdate' => '1990-01-01',
            'phone' => '774880987',
            'address' => 'V Mokřinách 8',
            'city' => 'Praha 4',
            'zip' => '14700',
            'company' => 'Zavolejsikurýra.cz a.s.',
            'ico' => '02628015',
            'dic' => 'CZ02628015',
            'password' => bcrypt('martinZoch1334'),
            'verified' => 1,
        ]);
        $user->assignRole(1);

        $user = User::create([
            'name' => 'Petra',
            'last_name' => 'Dlouhá',
            'email' => 'dlouha@pmautomotive.cz',
            'birthdate' => '1990-01-01',
            'phone' => '775404987',
            'address' => 'V Mokřinách 8',
            'city' => 'Praha 4',
            'zip' => '14700',
            'company' => 'PM Automotive s.r.o.',
            'ico' => '24789259',
            'dic' => 'CZ24789259',
            'password' => bcrypt('petraDlouha1224'),
            'verified' => 1,
        ]);
        $user->assignRole(2);
    }
}
