<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveFoto extends Model
{
    use HasFactory;
    protected $table = 'video';
    protected $fillable = [
        'foto'
    ];

}
