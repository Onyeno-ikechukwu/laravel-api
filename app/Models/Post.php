<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
      'Title',
      'Body',
      'author_id'
    ];
}
