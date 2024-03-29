<?php

namespace Database\Seeders;

use Faker\Factory;
use DB;
use Illuminate\Database\Seeder;

class ProduktySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $produkty = [
            ['id' => 1,
             'Nazwa' => 'Ziemniaki',
             'Cena' => 3,
             'Zdjecie' => 'Zdjecie/ziemniaki.jpg',
             'Ilosc' => 100,
             'JednostkaMiary' => 'kg',
             'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
             'fk_kategorie' => 1,
             'status' => 1,
            ],

            ['id' => 2,
            'Nazwa' => 'Kapusta Biała',
            'Cena' => 1,
            'Zdjecie' => 'Zdjecie/kapusta.jpg',
            'Ilosc' => 100,
            'JednostkaMiary' => 'kg',
            'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'fk_kategorie' => 1,
            'status' => 1,
           ],

           ['id' => 3,
           'Nazwa' => 'Fasola',
           'Cena' => 3,
           'Zdjecie' => 'Zdjecie/fasola.jpg',
           'Ilosc' => 100,
           'JednostkaMiary' => 'kg',
           'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
           'fk_kategorie' => 1,
           'status' => 1,
          ],

          ['id' => 4,
          'Nazwa' => 'Jabłka',
          'Cena' => 3,
          'Zdjecie' => 'Zdjecie/jablka.jpg',
          'Ilosc' => 100,
          'JednostkaMiary' => 'kg',
          'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
          'fk_kategorie' => 2,
          'status' => 1,
         ],

         ['id' => 5,
         'Nazwa' => 'Gruszki',
         'Cena' => 3,
         'Zdjecie' => 'Zdjecie/gruszki.jpg',
         'Ilosc' => 100,
         'JednostkaMiary' => 'kg',
         'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
         'fk_kategorie' => 2,
         'status' => 1,
        ],

        ['id' => 6,
        'Nazwa' => 'Truskawki',
        'Cena' => 3,
        'Zdjecie' => 'Zdjecie/truskawki.jpg',
        'Ilosc' => 100,
        'JednostkaMiary' => 'kg',
        'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        'fk_kategorie' => 2,
        'status' => 1,
       ],

       ['id' => 7,
       'Nazwa' => 'Prawdziwki',
       'Cena' => 3,
       'Zdjecie' => 'Zdjecie/prawdziwki.jpg',
       'Ilosc' => 100,
       'JednostkaMiary' => 'kg',
       'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
       'fk_kategorie' => 3,
       'status' => 1,
      ],

      ['id' => 8,
      'Nazwa' => 'Borowiki',
      'Cena' => 3,
      'Zdjecie' => 'Zdjecie/borowik.jpg',
      'Ilosc' => 100,
      'JednostkaMiary' => 'kg',
      'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
      'fk_kategorie' => 3,
      'status' => 1,
     ],

     ['id' => 9,
     'Nazwa' => 'Muchomory',
     'Cena' => 3,
     'Zdjecie' => 'Zdjecie/muchomor.jpg',
     'Ilosc' => 100,
     'JednostkaMiary' => 'kg',
     'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
     'fk_kategorie' => 3,
     'status' => 1,
    ],

    ['id' => 10,
    'Nazwa' => 'Miód',
    'Cena' => 3,
    'Zdjecie' => 'Zdjecie/miod.jpg',
    'Ilosc' => 100,
    'JednostkaMiary' => 'kg',
    'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
    'fk_kategorie' => 4,
    'status' => 1,
   ],

   ['id' => 11,
   'Nazwa' => 'Kozi ser',
   'Cena' => 3,
   'Zdjecie' => 'Zdjecie/koziser.jpg',
   'Ilosc' => 100,
   'JednostkaMiary' => 'kg',
   'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
   'fk_kategorie' => 4,
   'status' => 1,
  ],

  ['id' => 12,
  'Nazwa' => 'Rabarbar',
  'Cena' => 3,
  'Zdjecie' => 'Zdjecie/rabarba.jpg',
  'Ilosc' => 100,
  'JednostkaMiary' => 'kg',
  'Opis' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
  'fk_kategorie' => 4,
  'status' => 1,
 ],

        ];

        foreach ($produkty as $produkt) {
            DB::table('produkty')->insert([
                'id' => $produkt['id'],
                'Nazwa' => $produkt['Nazwa'],
                'Cena' => $produkt['Cena'],
                'Zdjecie' => $produkt['Zdjecie'],
                'Ilosc' => $produkt['Ilosc'],
                'JednostkaMiary' => $produkt['JednostkaMiary'],
                'Opis' => $produkt['Opis'],
                'fk_kategorie' => $produkt['fk_kategorie'],
                'status' => $produkt['status'],
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
