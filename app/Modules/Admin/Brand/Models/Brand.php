<?php

namespace App\Modules\Admin\Brand\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Modules\Admin\Brand\Traits\AttributeTrait;
use App\Modules\Admin\Brand\Traits\RelationshipTrait;
use App\Modules\Admin\Brand\Traits\ScopeTrait;

use Plank\Mediable\Mediable;

/**
 * @Brand
 *
 * @property bigInteger id
 * @property string name
 * @property tinyInteger status
 */
class Brand extends Model
{
    use SoftDeletes,
        Mediable,
        AttributeTrait,
        RelationshipTrait,
        ScopeTrait;

    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'status'
    ];
}
