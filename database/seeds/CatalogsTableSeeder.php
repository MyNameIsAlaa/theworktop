<?php

use Illuminate\Database\Seeder;
use App\Models\Catalog;

class CatalogsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catalog = Catalog::create([
            "catalog_name" => "Dry Asphalt",
            "picture_url" => "http://www.pictureurlhere.com",
            "wholesaler_id" => 2,
            "brightness_id" => 1
        ]);
        $catalog->Materials()->sync(1);
        $catalog->Colors()->sync([1, 4, 6, 3]);


        $catalog2 = Catalog::create([
            "catalog_name" => "Super White",
            "picture_url" => "http://www.pictureurlhere.com",
            "wholesaler_id" => 1,
            "brightness_id" => 2
        ]);
        $catalog2->Materials()->sync(2);
        $catalog2->Colors()->sync([1, 2]);


        $catalog3 = Catalog::create([
            "catalog_name" => "Larsen Blanco",
            "picture_url" => "http://www.pictureurlhere.com",
            "wholesaler_id" => 1,
            "brightness_id" => 2
        ]);
        $catalog3->Materials()->sync(2);
        $catalog3->Colors()->sync([1, 2]);

        $catalog4 = Catalog::create([
            "catalog_name" => "Trilium",
            "picture_url" => "http://www.pictureurlhere.com",
            "wholesaler_id" => 2,
            "brightness_id" => 1
        ]);
        $catalog4->Materials()->sync(1);
        $catalog4->Colors()->sync([3, 4]);

    }
}
