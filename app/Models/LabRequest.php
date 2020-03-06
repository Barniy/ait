<?php

namespace App\Models;

use App\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
