<?php

namespace Modules\Website\Database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Tag\Models\Website;

class WebsiteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        /*
         * Websites Seed
         * ------------------
         */

        // DB::table('websites')->truncate();
        // echo "Truncate: websites \n";

        Website::factory()->count(20)->create();
        $rows = Website::all();
        echo " Insert: websites \n\n";

        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
