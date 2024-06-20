<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    
    protected $fillable = ['game_id', 'user_id', 'note'];

    /**
     * この投稿を所有するゲーム。げmeモデルとの関係を定義）
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
