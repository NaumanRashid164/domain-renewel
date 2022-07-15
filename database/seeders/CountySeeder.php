<?php

namespace Database\Seeders;

use App\Models\County;
use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        County::create([
            'name' => 'Sligo'
        ]);

        County::create([
            'name' => 'clare'
        ]);

        County::create([
            'name' => 'Galway'
        ]);

        County::create([
            'name' => 'mayo'
        ]);

        County::create([
            'name' => 'limerick'
        ]);

        County::create([
            'name' => 'louth'
        ]);
    }
}
