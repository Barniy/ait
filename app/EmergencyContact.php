<?php

namespace App;

use App\Address;
use App\Http\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use UsesUuid;
    protected $fillable = [];
    protected $guarded = [];


    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->withDefault(function () {
            new EmergencyContact;
        });
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


}
