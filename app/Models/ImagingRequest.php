<?php

namespace App\Models;

use App\Patient;
use App\User;
use Illuminate\Database\Eloquent\Model;

class ImagingRequest extends Model
{
    protected $fillable = [];
    protected $guarded = [];
    protected $casts = [
        'patient_condition' => 'array',
        'examination_requested' => 'array',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
