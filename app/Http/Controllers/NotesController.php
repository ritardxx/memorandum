<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Game;
use App\Models\Note;

class NotesController extends Controller
{
    public function index($gameId)
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザーを取得
            $user = \Auth::user();
            
            $game = Game::find($gameId);
            
            $notes = $game->notes()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'notes' => $notes,
            ];
        }
        
        // dashboardビューでそれらを表示
        return view('dashboard', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'note' => 'required|max:255',
            'game_id' => 'required|exists:games,id',
        ]);
        
        $game = Game::find($request->game_id);
        
        // 認証済みユーザー（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $game->notes()->create([
            'user_id' => $request->user()->id,
            'note' => $request->note,
        ]);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy(string $id)
    {
        // idの値で投稿を検索して取得
        $note = Note::findOrFail($id);
        
        // 認証済みユーザー（閲覧者）がその投稿の所有者である場合は投稿を削除
        if (\Auth::id() === $note->user_id) {
            $note->delete();
            return back()
                ->with('success','Delete Successful');
        }

        // 前のURLへリダイレクトさせる
        return back()
            ->with('Delete Failed');
    }
    
    public function show(Game $game)
    {
        // 特定のゲームに関連するノートを取得
        $notes = $game->notes()->orderBy('created_at', 'desc')->get();

        return view('notes.show', compact('game', 'notes'));
    }
}
