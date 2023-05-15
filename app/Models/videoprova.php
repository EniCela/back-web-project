<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videoprova extends Model
{
    protected $table = 'videoprova';
    protected $primaryKey = 'id';
    protected $fillable = ['titulli', 'viti','regjizori','cmimi','koha','pershkrimi','video'];
    // use HasFactory;
}
