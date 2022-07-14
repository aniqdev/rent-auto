<?php

namespace Database\Seeders;

use App\Models\Caravan;
use App\Models\CaravanAttribute;
use App\Models\CaravanAttributeCategory;
use App\Models\Season;
use Illuminate\Database\Seeder;

class CaravanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $caravan = Caravan::create([
            'caravan_category_id' => 3,
            'user_id' => 1,
            'name' => 'Carado T448',
            'subtitle' => 'kompaktní obytný vůz s výklopnou střechou',
            'charasteristics' => 'luxusní vůz s alkovnou pro šest osob',
            'short_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'spz' => '4AC8444',
            'key_benefits' => 'Klíčové benefity',
            'seo_title' => 'Obytný vůz Carado T448',
            'seo_keywords' => 'obytny, polointegrovany, vuz, carado, t448, 448',
            'seo_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'sort' => 1,
        ]);

        $caravan->seasons()->attach(1, [
            'day_1' => 3900,
            'day_2' => 3900,
            'day_3' => 3900,
            'day_4' => 3900,
            'day_5' => 4900,
            'day_6' => 4900,
            'day_7' => 4900,
        ]);

        $caravan->seasons()->attach(2, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(3, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(4, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(5, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(6, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);

        $caravan->seasons()->attach(7, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);

        $caravan->seasons()->attach(8, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);




        $caravan = Caravan::create([
            'caravan_category_id' => 3,
            'user_id' => 1,
            'name' => 'Carado T459',
            'subtitle' => 'kompaktní obytný vůz s výklopnou střechou',
            'charasteristics' => 'luxusní vůz s alkovnou pro šest osob',
            'short_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'spz' => '4AC8455',
            'key_benefits' => 'Klíčové benefity',
            'seo_title' => 'Obytný vůz Carado T459',
            'seo_keywords' => 'obytny, polointegrovany, vuz, carado, t459, t459',
            'seo_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'sort' => 2,
        ]);

        $caravan->seasons()->attach(1, [
            'day_1' => 3900,
            'day_2' => 3900,
            'day_3' => 3900,
            'day_4' => 3900,
            'day_5' => 4900,
            'day_6' => 4900,
            'day_7' => 4900,
        ]);

        $caravan->seasons()->attach(2, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(3, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(4, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(5, [
            'day_1' => 3400,
            'day_2' => 3400,
            'day_3' => 3400,
            'day_4' => 3400,
            'day_5' => 4000,
            'day_6' => 4000,
            'day_7' => 4000,
        ]);

        $caravan->seasons()->attach(6, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);

        $caravan->seasons()->attach(7, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);

        $caravan->seasons()->attach(8, [
            'day_1' => 2900,
            'day_2' => 2900,
            'day_3' => 2900,
            'day_4' => 2900,
            'day_5' => 2900,
            'day_6' => 2900,
            'day_7' => 2900,
        ]);




        $caravan = Caravan::create([
            'caravan_category_id' => 4,
            'user_id' => 1,
            'name' => 'GiottiLine Therry 45',
            'subtitle' => 'kompaktní obytný vůz s výklopnou střechou',
            'charasteristics' => 'luxusní vůz s alkovnou pro šest osob',
            'short_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'spz' => '4AA1120',
            'key_benefits' => 'Klíčové benefity',
            'seo_title' => 'Obytný vůz GiottiLine Therry 45',
            'seo_keywords' => 'obytny, alkovna, vuz, giottiline, therry, therry 45',
            'seo_description' => 'Komfortní vůz pro 4 až 5 osob se sklopným lůžkem nad středovým sezením. Spojením zadních lůžek lze vytvořit veliké letiště nad prostornou zadní garáží. Přistýlka na složeném stole vytvoří 5.místo na spaní a přídavné sedadlo na lavici 5.místo na jízdu.',
            'sort' => 3,
        ]);

        $caravan->seasons()->attach(1, [
            'day_1' => 4129,
            'day_2' => 4129,
            'day_3' => 4129,
            'day_4' => 4129,
            'day_5' => 4129,
            'day_6' => 4129,
            'day_7' => 4129,
        ]);

        $caravan->seasons()->attach(2, [
            'day_1' => 3800,
            'day_2' => 3800,
            'day_3' => 3800,
            'day_4' => 3800,
            'day_5' => 4600,
            'day_6' => 4600,
            'day_7' => 4600,
        ]);

        $caravan->seasons()->attach(3, [
            'day_1' => 3800,
            'day_2' => 3800,
            'day_3' => 3800,
            'day_4' => 3800,
            'day_5' => 4600,
            'day_6' => 4600,
            'day_7' => 4600,
        ]);

        $caravan->seasons()->attach(4, [
            'day_1' => 3800,
            'day_2' => 3800,
            'day_3' => 3800,
            'day_4' => 3800,
            'day_5' => 4600,
            'day_6' => 4600,
            'day_7' => 4600,
        ]);

        $caravan->seasons()->attach(5, [
            'day_1' => 3800,
            'day_2' => 3800,
            'day_3' => 3800,
            'day_4' => 3800,
            'day_5' => 4600,
            'day_6' => 4600,
            'day_7' => 4600,
        ]);

        $caravan->seasons()->attach(6, [
            'day_1' => 3000,
            'day_2' => 3000,
            'day_3' => 3000,
            'day_4' => 3000,
            'day_5' => 3000,
            'day_6' => 3000,
            'day_7' => 3000,
        ]);

        $caravan->seasons()->attach(7, [
            'day_1' => 3000,
            'day_2' => 3000,
            'day_3' => 3000,
            'day_4' => 3000,
            'day_5' => 3000,
            'day_6' => 3000,
            'day_7' => 3000,
        ]);

        $caravan->seasons()->attach(8, [
            'day_1' => 3000,
            'day_2' => 3000,
            'day_3' => 3000,
            'day_4' => 3000,
            'day_5' => 3000,
            'day_6' => 3000,
            'day_7' => 3000,
        ]);
    }
}
