<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserImages extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
         'users_id', 'image_path'
    ];
    protected $table = 'userImages';
}
