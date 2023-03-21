<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productsInventoryModel extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'products_inventory';
    protected $primaryKey = 'id';

    public function products()
    {
        $this->belongsTo('App\Models\productsModel');
    }
}
