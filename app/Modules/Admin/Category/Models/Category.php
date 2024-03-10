<?php

namespace App\Modules\Admin\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Admin\Category\Traits\AttributeTrait;
use App\Modules\Admin\Category\Traits\RelationshipTrait;
use App\Modules\Admin\Category\Traits\ScopeTrait;

use Plank\Mediable\Mediable;

/**
 * @Category
 *
 * @property bigInt id
 * @property string name
 * @property string slug
 * @property string table_product_name
 * @property bigInt parent_id
 */
class Category extends Model
{
     use HasFactory,
         SoftDeletes,
         Mediable,
         AttributeTrait,
         RelationshipTrait,
         ScopeTrait;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'table_product_name',
        'parent_id',
    ];
}
