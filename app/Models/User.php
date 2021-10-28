<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function userFriends()
    {
      return $this->belongsToMany(User::class,'friend_user','user_id','friend_id');
    }

    public function friendsUser()
    {
      return $this->belongsToMany(User::class,'friend_user','friend_id','user_id');
    }


    public function posts()
  {
    return $this->hasMany(Post::class);
  }

  public function comments()
{
  return $this->hasMany(Comment::class);
}

  public function requests()
  {
    return $this->hasMany(Requests::class);
  }
}
