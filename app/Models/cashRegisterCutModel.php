<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cashRegisterCutModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'cash_registers_cut';
    protected $primaryKey = 'id';

    public function vouchers()
    {
        $this->belongsTo('App\Models\vouchersModel');
    }
}
