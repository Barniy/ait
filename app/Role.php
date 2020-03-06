<?php

namespace App;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{

    protected $primaryKey = 'id';
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

}
