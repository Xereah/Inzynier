<?php

namespace Database\Seeders;

use Faker\Factory;
use DB;
use Illuminate\Database\Seeder;

class KategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $kategorie = [
            ['id' => 1, 'Nazwa' => 'Warzywa' , 'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
            ['id' => 2, 'Nazwa' => 'Owoce' , 'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
            ['id' => 3, 'Nazwa' => 'Grzyby' , 'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
            ['id' => 4, 'Nazwa' => 'Inne' , 'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'],
                      
        ];

        foreach ($kategorie as $kategoria) {
            DB::table('kategorie')->insert([
                // stałe id
                'id' => $kategoria['id'],
               
                'Nazwa' => $kategoria['Nazwa'],
                'Opis' => $kategoria['Opis'],
              
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
