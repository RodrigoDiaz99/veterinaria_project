<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeOfAppointmentModel extends Model
{
    use HasFactory;
    
    protected $table = 'type_of_appointment';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'price'
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
}
