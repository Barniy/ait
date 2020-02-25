<?php

namespace App;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use UsesUuid;
    protected $fillable = [];

    protected $guarded = [];
    public function addressable()
    {
        return $this->morphTo();
    }
}
