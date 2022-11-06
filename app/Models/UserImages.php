<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
    use HasFactory;
    protected $fillable = [
         'users_id', 'image_path'
    ];
    protected $table = 'userImages';
}
