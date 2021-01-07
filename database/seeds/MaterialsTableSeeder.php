<?php

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialsTableSeeder extends Seeder
{

    public $materials = ["Ceramic", "Quartz", "Granite", "Marble"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->materials as $key => $value) {
            Material::create([
                "material_name" => $value
            ]);
        }
    }
}
