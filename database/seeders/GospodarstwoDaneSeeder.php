<?php

namespace Database\Seeders;

use Faker\Factory;
use DB;
use Illuminate\Database\Seeder;

class GospodarstwoDaneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $gospodarstwo = [
            ['id' => 1,
             'Imie_Wlasciciel' => 'Patryk',
             'Nazwisko_Wlasciciel' => 'Struzik',
             'Miejscowosc' => 'Wągłczew-Kolonia 14',
             'Kod_Pocztowy' => '98-285',
             'Poczta_Miejscowosc' => 'Wrólew',
             'Telefon' => '513623174',
             'Email' => 'patrykstruzik@onet.pl',
            ],
        ];

        foreach ($gospodarstwo as $gospodarz) {
            DB::table('gospodarstwo_dane')->insert([
                'id' => $gospodarz['id'],
                'Imie_Wlasciciel' => $gospodarz['Imie_Wlasciciel'],
                'Nazwisko_Wlasciciel' => $gospodarz['Nazwisko_Wlasciciel'],
                'Miejscowosc' => $gospodarz['Miejscowosc'],
                'Kod_Pocztowy' => $gospodarz['Kod_Pocztowy'],
                'Poczta_Miejscowosc' => $gospodarz['Poczta_Miejscowosc'],
                'Telefon' => $gospodarz['Telefon'],
                'Email' => $gospodarz['Email'],
                // losowa data w zadanym zakresie
                'created_at' => $faker->dateTimeBetween(
                     '-20 days',
                     '-10 days'
                 ),
                 'updated_at' => rand(0, 9) < 5
                    ? null
                    : $faker->dateTimeBetween(
                        '-10 days',
                        '-5 days'
                    ),
                //     'deleted_at' => rand(0, 9) < 8
                //     ? null
                //     : $faker->dateTimeBetween(
                //         '-5 days',
                //         'now'
                //   )
            ]);
        }
    }
}
