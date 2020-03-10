<?php

namespace App;


use App\Models\LabRequest;
use App\Models\Appointment;
use App\Http\Traits\UsesUuid;
use App\Models\Patient\Vital;
use App\Models\ImagingRequest;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function vitals()
    {
        return $this->hasMany(Vital::class);
    }

    public function labRequests()
    {
        return $this->hasMany(LabRequest::class);
    }

    public function imagingRequests()
    {
        return $this->hasMany(ImagingRequest::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
