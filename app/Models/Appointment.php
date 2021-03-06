<?php

namespace App\Models;

use App\User;
use App\Patient;
use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
