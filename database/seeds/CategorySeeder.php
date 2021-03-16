<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'PC',
        ]);

        DB::table('categories')->insert([
            'name' => 'Consoles',
        ]);
        
        DB::table('categories')->insert([
            'name' => 'Other',
        ]);
    }
}
