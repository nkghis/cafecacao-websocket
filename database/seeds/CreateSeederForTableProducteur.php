<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateSeederForTableProducteur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producteurs')->insert([

                [
                    'nom' => 'KOUADIO',
                    'reference' => '0000001',
                    'prenom' => 'ALPHONSE',
                    'datenaiss' => Carbon::now(),
                    'localite' => 'GRAND ZATTRY',
                    'cooperative_id' => '4',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ],
                [
                    'nom' => 'OUEDRAOGO',
                    'reference' => '0000002',
                    'prenom' => 'BOUKARY',
                    'datenaiss' => Carbon::now(),
                    'localite' => 'MEAGUI',
                    'cooperative_id' => '1',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ],
                [
                    'nom' => 'KOUASSI',
                    'reference' => '0000003',
                    'prenom' => 'KOUASSI BENOIT',
                    'datenaiss' => Carbon::now(),
                    'localite' => 'TAPEGUIA',
                    'cooperative_id' => '2',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ],
                [
                    'nom' => 'TAPE',
                    'reference' => '0000004',
                    'prenom' => 'GNABO FLORENTIN IGNACE',
                    'datenaiss' => Carbon::now(),
                    'localite' => 'GRAND ZATTRY',
                    'cooperative_id' => '4',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]

            ]
        );
    }
}
