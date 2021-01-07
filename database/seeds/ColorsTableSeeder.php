<?php

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorsTableSeeder extends Seeder
{

    public $colors = ["White", "Gray", "Cream", "Gold", "Green", "Black", "Brown", "Red", "Pink", "Blue", "Purple", "Yellow", "Orange"];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach ($this->colors as $key => $value) {
            Color::Create([
                'color_name' => $value
            ]);
        }
    }
}
