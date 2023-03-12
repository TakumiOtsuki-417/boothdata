<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'position',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    // positionを定数として登録
    const POSITIONS = [
        ['id'=>0, 'name'=>'W朝巡回A'],
        ['id'=>1, 'name'=>'W朝巡回B'],
        ['id'=>2, 'name'=>'W昼巡回'],
        ['id'=>3, 'name'=>'M朝巡回'],
        ['id'=>4, 'name'=>'M昼巡回'],
        ['id'=>5, 'name'=>'W夜巡回'],
        ['id'=>6, 'name'=>'M夜巡回'],
    ];

}
