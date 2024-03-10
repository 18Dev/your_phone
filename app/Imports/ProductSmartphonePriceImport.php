<?php

namespace App\Imports;

use App\Modules\Admin\ProductSmartPhonePrice\Models\ProductSmartPhonePrice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductSmartphonePriceImport implements ToModel, WithHeadingRow
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
     * Import file
     *
     * @param array $row
     * @return ProductSmartPhonePrice|void
     */
    public function model(array $row)
    {
        // If ID is empty, do not import
        if (!isset($row['id'])) {
            return;
        }

        return new ProductSmartPhonePrice([
            'id' => $row['id'],
            'smartphone_attr_id' => $row['smartphone_attr_id'],
            'ram' => $row['ram'],
            'storage_capacity' => $row['storage_capacity'],
            'remaining_capacity_is_approx' => $row['remaining_capacity_is_approx'],
            'color' => $row['color'],
            'price' => $row['price'],
            'quantity' => $row['quantity'],
        ]);
    }
}
