<?php

namespace App\Models\Patient;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient\Patient');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
