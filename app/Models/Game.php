<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'user_id'];

    /**
     * このゲームを所有するユーザー。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このゲームが所有する投稿。（ Noteモデルとの関係を定義）
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }
    
    /**
     * このゲームに関係するモデルの件数をロードする。
     */
    public function loadRelationshipCounts()
    {
        $this->loadCount('notes');
    }
}
