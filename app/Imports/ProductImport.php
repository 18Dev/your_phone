<?php

namespace App\Imports;

use App\Modules\Admin\Brand\Models\Brand;
use App\Modules\Admin\Category\Models\Category;
use App\Modules\Admin\Product\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
     * Specify title
     *
     * @return int
     */
    public function headingRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     * @return Product|void
     */
    public function model(array $row)
    {
        // If ID is empty, do not import
        if (!isset($row['id'])) {
            return;
        }

        return new Product([
            'id' => $row['id'],
            'name' => $row['name'],
            'slug' => generateSlug($row['name']),
            'category_id' => Category::where('name', $row['category_name'])->first()->id,
            'brand_id' => Brand::where('name', $row['brand_name'])->first()->id,
            'product_id' => $row['product_id'],
            'status' => $row['status'],
        ]);
    }
}
