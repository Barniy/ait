<?php

namespace App\Models;

use App\User;
use App\Patient;
use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];
    protected $casts = [
        'specimen_type' => 'array',
        'lab_tests' => 'array',
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
