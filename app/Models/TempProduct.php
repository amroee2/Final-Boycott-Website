<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_name',
        'sub_category',
        'category',
        'barcode',
        'boycott'
    ];
    protected $table = 'temp_products'; // Specify the correct table name.
    public $timestamps = false;
}
