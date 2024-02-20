<?php

namespace App\Modules\Admin\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Admin\Product\Traits\AttributeTrait;
use App\Modules\Admin\Product\Traits\RelationshipTrait;
use App\Modules\Admin\Product\Traits\ScopeTrait;

use Plank\Mediable\Mediable;

/**
 * @Product
 *
 * @property string name
 * @property text slug
 * @property bigInteger category_id
 * @property bigInteger brand_id
 * @property bigInteger product_id
 * @property tinyInteger status
 */
class Product extends Model
{
     use HasFactory,
         SoftDeletes,
         Mediable,
         AttributeTrait,
         RelationshipTrait,
         ScopeTrait;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'product_id',
        'status',
    ];
}
