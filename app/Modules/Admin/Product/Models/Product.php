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
 * TODO attribute model
 */
class Product extends Model
{
     use HasFactory,
         SoftDeletes,
         Mediable,
         AttributeTrait,
         RelationshipTrait,
         ScopeTrait;

    protected $table = '';

    protected $primaryKey = '';

    protected $fillable = [];
}
