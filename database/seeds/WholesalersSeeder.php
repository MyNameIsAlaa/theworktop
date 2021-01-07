<?php

use Illuminate\Database\Seeder;
use App\Models\Wholesaler;

class WholesalersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i <= 10; $i++) {
            Wholesaler::Create([
                'wholesaler_name' => 'Seller Number ' . $i
            ]);
        }
    }
}
