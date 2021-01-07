<?php

use Illuminate\Database\Seeder;
use App\Models\Catalogs_Slobs;

class CatalogsSlobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Catalogs_Slobs::create([
            "catalog_id" => 1,
            "width" => 180,
            "length" => 150,
            "thickness" => 1,
            "cost" => 398
        ]);
        Catalogs_Slobs::create([
            "catalog_id" => 1,
            "width" => 140,
            "length" => 190,
            "thickness" => 2,
            "cost" => 499
        ]);

        Catalogs_Slobs::create([
            "catalog_id" => 2,
            "width" => 190,
            "length" => 160,
            "thickness" => 1,
            "cost" => 288
        ]);
        Catalogs_Slobs::create([
            "catalog_id" => 2,
            "width" => 190,
            "length" => 170,
            "thickness" => 2,
            "cost" => 277
        ]);
    }
}
