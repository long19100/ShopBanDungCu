<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lienhe';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
    ];
    public $timestamps = false;
}
