<?php

namespace Database\Seeders;

use Faker\Factory;
use DB;
use Illuminate\Database\Seeder;

class PlatnosciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $platnosci = [
            1 => 'Gotówka na miejscu',
            2 => 'Online',
                      
        ];

        foreach ($platnosci as $key => $platnosc) {
            DB::table('platnosc')->insert([
                // stałe id
                'id' => $key,
                // losowy wyraz
                'platnosc' => $platnosc,
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
