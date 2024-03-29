<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $fillable =[
        'bid',
        'barcode',
        'id'
    ];

    public $timestamps = false;
    protected $table = 'barcodes';
}
