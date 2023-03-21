<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class recordsModel extends Model
{

    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'records';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pet_id', 'prescriptions', 'weight', 'remarks'
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

    public function pet()
    {
        return $this->hasOne(petsModel::class, 'id', 'pet_id');
    }
}
