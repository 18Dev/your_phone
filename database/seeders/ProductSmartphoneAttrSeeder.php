<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductSmartphoneAttrImport;

class ProductSmartphoneAttrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = __DIR__ . '/../imports/product_smartphone_attr.xlsx';
        Excel::import(new ProductSmartphoneAttrImport, $file);
    }
}
