<?php

namespace App;


use App\Address;
use App\Models\Department;
use App\Models\LabRequest;
use App\Models\Appointment;
use App\Http\Traits\UsesUuid;
use App\Models\Patient\Vital;
use App\Models\ImagingRequest;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
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

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class)->withDefault(function () {
            new EmergencyContact;
        });
    }

    public function vitals()
    {
        return $this->hasMany(Vital::class);
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class)->withPivot(['user_id'])->withTimestamps();
    }

    public function labRequests()
    {
        return $this->hasMany(LabRequest::class);
    }
    public function imagingRequests()
    {
        return $this->hasMany(ImagingRequest::class);
    }
    public static function deletePatient($id)
    {
        $patient = self::find($id);

        if ($patient->address()->exists()) {
            $patient->address()->delete();
        }

        if ($patient->emergencyContact()->exists()) {
            $patient->emergencyContact()->delete();
        }

        if ($patient->vitals()->exists()) {
            $patient->vitals()->delete();
        }

        $patient->delete();
        return true;
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function queus()
    {
        return $this->belongsTo(Queue::class);
    }
}
