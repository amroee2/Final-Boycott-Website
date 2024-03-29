<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'message'
    ];

    public $timestamps = false;

    protected $table = 'messages'; // Specify the correct table name.
}
