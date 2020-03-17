<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;

class TempPatient extends Model
{
    use UsesUuid;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
