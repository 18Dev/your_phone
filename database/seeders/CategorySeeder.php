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

        DB::table('categories')->insert($this->fakeData());
    }

    /**
     * @return array[]
     */
    private function fakeData()
    {
        return [
            ['id' => 1, 'name' => 'Smartphone', 'slug' => 'smartphone', 'table_product_name' => null, 'parent_id' => null, 'created_at' => now()],
            ['id' => 2, 'name' => 'iPhone', 'slug' => 'iphone', 'table_product_name' => null, 'parent_id' => 1, 'created_at' => now()],
            ['id' => 3, 'name' => 'iPhone 15', 'slug' => 'iphone-15', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 4, 'name' => 'iPhone 15 Plus', 'slug' => 'iphone-15-plus', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 5, 'name' => 'iPhone 15 Pro', 'slug' => 'iphone-15-pro', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 6, 'name' => 'iPhone 15 Pro Max', 'slug' => 'iphone-15-pro-max', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 7, 'name' => 'iPhone 14', 'slug' => 'iphone-14', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 8, 'name' => 'iPhone 14 Plus', 'slug' => 'iphone-14-plus', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 9, 'name' => 'iPhone 14 Pro', 'slug' => 'iphone-14-pro', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 10, 'name' => 'iPhone 14 Pro Max', 'slug' => 'iphone-14-pro-max', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 11, 'name' => 'iPhone 13', 'slug' => 'iphone-13', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 12, 'name' => 'iPhone 13 Mini', 'slug' => 'iphone-13-mini', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 13, 'name' => 'iPhone 13 Pro', 'slug' => 'iphone-13-pro', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 14, 'name' => 'iPhone 13 Pro Max', 'slug' => 'iphone-13-pro-max', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 15, 'name' => 'iPhone 12', 'slug' => 'iphone-12', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 16, 'name' => 'iPhone 12 Mini', 'slug' => 'iphone-12-mini', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 17, 'name' => 'iPhone 12 Pro', 'slug' => 'iphone-12-pro', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 18, 'name' => 'iPhone 12 Pro Max', 'slug' => 'iphone-12-pro-max', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 19, 'name' => 'iPhone 11', 'slug' => 'iphone-11', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 20, 'name' => 'iPhone 11 Pro', 'slug' => 'iphone-11-pro', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
            ['id' => 21, 'name' => 'iPhone 11 Pro Max', 'slug' => 'iphone-11-pro-max', 'table_product_name' => 'product_smartphone_attr', 'parent_id' => 2, 'created_at' => now()],
        ];
    }
}
