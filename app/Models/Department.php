<?php

namespace App\Models;

use App\Http\Traits\UsesUuid;
use App\Patient;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];

    public function patients()
    {
        return $this->hasMany(Patient::class)->withTimestamps();
    }

    public function tempPatients()
    {
        return $this->hasMany(TempPatient::class);
    }
}
