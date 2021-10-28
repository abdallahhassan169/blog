<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Requests extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = array('user_id','friend_id','status');

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
