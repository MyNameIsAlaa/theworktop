<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(Brightnesstableseeder::class);
        $this->call(WholesalersSeeder::class);
        $this->call(CatalogsTableSeeder::class);
        $this->call(CatalogsSlobsTableSeeder::class);


        Model::reguard();
    }
}
