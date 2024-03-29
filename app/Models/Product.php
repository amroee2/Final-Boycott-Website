<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ar_name',
        'barcode',
        'boycott',
        'sub_category',
        'category'
    ];

    public $timestamps = false;

    protected $table = 'products'; // Specify the correct table name.

}
