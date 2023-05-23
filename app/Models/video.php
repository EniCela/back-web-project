<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $table = 'video';
    protected $primaryKey = 'id';
    protected $fillable = ['titulli', 'viti','regjizori','cmimi','koha','pershkrimi','video','foto'];
    // use HasFactory;
}
