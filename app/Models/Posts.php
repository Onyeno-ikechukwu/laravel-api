<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = [
      'Title',
      'Body',
      'author_id'
    ];
}
