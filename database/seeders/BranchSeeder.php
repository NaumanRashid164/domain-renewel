<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'county_id' => '1',
            'name' => 'Tieragh',
            'branch_name' => 'Sligo-Tieragh',
        ]);
    }
}
