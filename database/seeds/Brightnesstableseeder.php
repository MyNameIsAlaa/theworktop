<?php

use Illuminate\Database\Seeder;
use App\Models\Brightness;

class Brightnesstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Brightness::create([
            "brightness_title" => "Light",
        ]);
        Brightness::create([
            "brightness_title" => "Dark",
        ]);
    }
}
