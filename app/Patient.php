<?php

namespace App;


use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use UsesUuid;

    protected $fillable = [];
    protected $guarded = [];

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function emergencyContact()
    {
        return $this->hasOne('App\EmergencyContact');
    }
}
