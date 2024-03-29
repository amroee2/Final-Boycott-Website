<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    use HasFactory;

    protected $fillable = [
        'alias_name',
        'aslias_name2',
    ];

    public $timestamps = false;

    protected $table = 'aliases'; // Specify the correct table name.
}
