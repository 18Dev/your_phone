<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('categories')->insert(
            [
                'id' => 1,
                'name' => 'Smartphone',
                'slug' => 'smartphone',
                'table_product_name' => 'product_smartphone_attr',
                'parent_id' => null,
                'created_at' => now()
            ],
        );
    }
}
