<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('brands')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('brands')->insert($this->fakeData());
    }

    /**
     * @return array|array[]
     */
    private function fakeData()
    {
        $name = [
            'Apple',
            'Samsung',
            'Oppo'
        ];

        return array_map(function ($name) {
            return [
                'name'       => $name,
                'status'     => STOP_SELLING,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $name);
    }
}
