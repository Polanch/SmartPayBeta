<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_products';
    protected $primaryKey = 'ProductID';
    public $timestamps = false;
    protected $fillable = [
        'ProductName',
        // Add other fields if needed
    ];
}
