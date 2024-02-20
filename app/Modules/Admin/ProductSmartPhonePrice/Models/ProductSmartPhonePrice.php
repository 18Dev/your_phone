<?php

namespace App\Modules\Admin\ProductSmartPhonePrice\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Admin\ProductSmartPhonePrice\Traits\AttributeTrait;
use App\Modules\Admin\ProductSmartPhonePrice\Traits\RelationshipTrait;
use App\Modules\Admin\ProductSmartPhonePrice\Traits\ScopeTrait;

use Plank\Mediable\Mediable;

/**
 * @ProductSmartPhonePrice
 *
 * @property bigInteger smartphone_attr_id
 * @property string ram
 * @property string storage_capacity
 * @property string color
 * @property string price
 * @property bigInteger quantity
 * @property tinyInteger status
 */
class ProductSmartPhonePrice extends Model
{
     use HasFactory,
         SoftDeletes,
         Mediable,
         AttributeTrait,
         RelationshipTrait,
         ScopeTrait;

    protected $table = 'product_smartphone_price';

    protected $primaryKey = 'id';

    protected $fillable = [
        'smartphone_attr_id',
        'ram',
        'storage_capacity',
        'color',
        'quantity',
        'status',
    ];
}
