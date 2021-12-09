<?php

namespace App\Modules\Currency\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class CurrencyDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('currencies')->insert([
            'name' => 'USD',
            'value' => '1.0000',
        ]);
        DB::table('currencies')->insert([
            'name' => 'NPR',
            'value' => '0.0085',
        ]);
        DB::table('currencies')->insert([
            'name' => 'INR',
            'value' => '0.014',
        ]);

        DB::table('currencies')->insert([
            'name' => 'MYR',
            'value' => '0.24',
        ]);
        // $this->call("OthersTableSeeder");
    }
}
