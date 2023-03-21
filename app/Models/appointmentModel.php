<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class appointmentModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'appointment';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pet_id', 'typeOfAppointment_id', 'appointmentStatus_id', 'dateOfAppointment', 'timeOfAppointment', 'dental_cleaning', 'observations'
    ];

    /* *
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * / 
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];*/

    /* *
     * The attributes that should be cast to native types.
     *
     * @var array
     * /
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    /* *
     * The accessors to append to the model's array form.
     *
     * @var array
     *
     * /
    protected $appends = [
        'profile_photo_url',
    ];*/
    
    public function pet() {
        return $this->belongsTo(petsModel::class);
    }

    public function type() {
        return $this->hasOne(typeOfAppointmentModel::class, 'id', 'typeOfAppointment_id');
    }
    
    public function status() {
        return $this->hasOne(statusOfAppointmentModel::class, 'id', 'appointmentStatus_id');
    }
}
