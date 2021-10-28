<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
  use HasApiTokens, HasFactory;
protected $fillable = array('body','post_id','user_id');

public function user()
{
  return $this->belongsTo(User::class);
}

public function post()
{
  return $this->belongsTo(Post::class);
}

}
