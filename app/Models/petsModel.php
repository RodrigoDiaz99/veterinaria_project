<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class petsModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pets';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name', 'race', 'sizePets_id', 'observations'
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

    public function appointment()
    {
        return $this->hasOne(appointmentModel::class, 'id', 'pet_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function records()
    {
        return $this->hasMany(recordsModel::class);
    }

}
