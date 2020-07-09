<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateSeederForTablePisteur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pisteurs')->insert([

            [
                'login' => 'nkghis',
                'nom' => 'N\'KAGOU',
                'prenom' => 'GHISLAIN',
                'motdepasse' => Hash::make('123456'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

            [
                'login' => 'kacjea',
                'nom' => 'KACOU',
                'prenom' => 'JEANNETTE',
                'motdepasse' => Hash::make('123456'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()

            ],




        ]);
    }
}
