<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vouchersModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'vouchers';
    protected $primaryKey = 'code';

    public function appointments()
    {
        $this->belongsTo('App\Models\appointmentsModel');
    }

    public function products()
    {
        $this->hasMany('App\Models\productsModel');
    }

    public function cashRegisterCut(){
        $this->hasMany('App\Models\vouchersModel');
    }
}
