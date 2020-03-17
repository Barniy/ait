<?php

namespace App;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use UsesUuid;
    
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
