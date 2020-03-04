<?php

namespace App\Models;

use App\Patient;
use Illuminate\Database\Eloquent\Model;

class LabRequest extends Model
{
    protected $fillable = [];
    protected $guarded = [];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
