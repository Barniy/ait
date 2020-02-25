<?php

namespace App;

use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];


    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
