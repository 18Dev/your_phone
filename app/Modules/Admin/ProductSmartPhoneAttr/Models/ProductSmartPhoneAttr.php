<?php

namespace App\Modules\Admin\ProductSmartPhoneAttr\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Admin\ProductSmartPhoneAttr\Traits\AttributeTrait;
use App\Modules\Admin\ProductSmartPhoneAttr\Traits\RelationshipTrait;
use App\Modules\Admin\ProductSmartPhoneAttr\Traits\ScopeTrait;

use Plank\Mediable\Mediable;

/**
 * @ProductSmartPhoneAttr
 */
class ProductSmartPhoneAttr extends Model
{
     use HasFactory,
         SoftDeletes,
         Mediable,
         AttributeTrait,
         RelationshipTrait,
         ScopeTrait;

    protected $table = 'product_smartphone_attr';

    protected $primaryKey = 'id';

    // All columns are editable
    protected $guarded = [];
}
