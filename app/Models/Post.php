<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime',
        'booth_id',
        'before_paper',
        'after_paper',
        'user_id',
    ];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * ブース情報
     */
    const BOOTHS = [
        ['id' => 0, 'name' => '7F女ブース1', 'floor' => '7F'],
        ['id' => 1, 'name' => '7F女ブース2', 'floor' => '7F'],
        ['id' => 2, 'name' => '7F男ブース1', 'floor' => '7F'],
        ['id' => 3, 'name' => '6F南女ブース1', 'floor' => '6F南'],
        ['id' => 4, 'name' => '6F南女ブース2', 'floor' => '6F南'],
        ['id' => 5, 'name' => '6F南女ブース3', 'floor' => '6F南'],
        ['id' => 6, 'name' => '6F南女ブース4', 'floor' => '6F南'],
        ['id' => 7, 'name' => '6F南男ブース1', 'floor' => '6F南'],
        ['id' => 8, 'name' => '6F南男ブース2', 'floor' => '6F南'],
        ['id' => 9, 'name' => '6F南マルチ', 'floor' => '6F南'],
        ['id' => 10, 'name' => '6F北女ブース1', 'floor' => '6F北'],
        ['id' => 11, 'name' => '6F北女ブース2', 'floor' => '6F北'],
        ['id' => 12, 'name' => '6F北女ブース3', 'floor' => '6F北'],
        ['id' => 13, 'name' => '6F北女ブース4', 'floor' => '6F北'],
        ['id' => 14, 'name' => '6F北男ブース1', 'floor' => '6F北'],
        ['id' => 15, 'name' => '6F北男ブース2', 'floor' => '6F北'],
        ['id' => 16, 'name' => '5F南女ブース1', 'floor' => '5F南'],
        ['id' => 17, 'name' => '5F南女ブース2', 'floor' => '5F南'],
        ['id' => 18, 'name' => '5F南女ブース3', 'floor' => '5F南'],
        ['id' => 19, 'name' => '5F南女ブース4', 'floor' => '5F南'],
        ['id' => 20, 'name' => '5F南男ブース1', 'floor' => '5F南'],
        ['id' => 21, 'name' => '5F南男ブース2', 'floor' => '5F南'],
        ['id' => 22, 'name' => '5F北女ブース1', 'floor' => '5F北'],
        ['id' => 23, 'name' => '5F北女ブース2', 'floor' => '5F北'],
        ['id' => 24, 'name' => '5F北女ブース3', 'floor' => '5F北'],
        ['id' => 25, 'name' => '5F北男ブース1', 'floor' => '5F北'],
        ['id' => 26, 'name' => '4F南女ブース1', 'floor' => '4F南'],
        ['id' => 27, 'name' => '4F南女ブース2', 'floor' => '4F南'],
        ['id' => 28, 'name' => '4F南女ブース3', 'floor' => '4F南'],
        ['id' => 29, 'name' => '4F南女ブース4', 'floor' => '4F南'],
        ['id' => 30, 'name' => '4F南男ブース1', 'floor' => '4F南'],
        ['id' => 31, 'name' => '4F南男ブース2', 'floor' => '4F南'],
        ['id' => 32, 'name' => '4F南マルチ', 'floor' => '4F南'],
        ['id' => 33, 'name' => '4F北女ブース1', 'floor' => '4F北'],
        ['id' => 34, 'name' => '4F北女ブース2', 'floor' => '4F北'],
        ['id' => 35, 'name' => '4F北女ブース3', 'floor' => '4F北'],
        ['id' => 36, 'name' => '4F北男ブース1', 'floor' => '4F北'],
        ['id' => 37, 'name' => '3F女ブース1', 'floor' => '3F'],
        ['id' => 38, 'name' => '3F女ブース2', 'floor' => '3F'],
        ['id' => 39, 'name' => '3F女ブース3', 'floor' => '3F'],
        ['id' => 40, 'name' => '3F女ブース4', 'floor' => '3F'],
        ['id' => 41, 'name' => '3F男ブース1', 'floor' => '3F'],
        ['id' => 42, 'name' => '3F男ブース2', 'floor' => '3F'],
        ['id' => 43, 'name' => '3Fマルチ', 'floor' => '3F'],
        ['id' => 44, 'name' => '2F女ブース1', 'floor' => '2F'],
        ['id' => 45, 'name' => '2F女ブース2', 'floor' => '2F'],
        ['id' => 46, 'name' => '2F女ブース3', 'floor' => '2F'],
        ['id' => 47, 'name' => '2F女ブース4', 'floor' => '2F'],
        ['id' => 48, 'name' => '2F男ブース1', 'floor' => '2F'],
        ['id' => 49, 'name' => '2F男ブース2', 'floor' => '2F'],
        ['id' => 50, 'name' => '2Fマルチ', 'floor' => '2F'],
    ];
}
