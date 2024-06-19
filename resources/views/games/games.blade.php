<div class="mt-4">
    @if (isset($games))
        <ul class="list-none">
            @foreach ($games as $game)
                <li class="flex items-start gap-x-2 mb-4">
                        <div>
                            {{-- game title --}}
                            <p class="mb-0">{!! nl2br(e($game->title)) !!}</p>
                        </div>
                        <div>
                            @if (Auth::id() == $game->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('games.destroy', $game->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm normal-case" 
                                        onclick="return confirm('Delete id = {{ $game->id }} ?')">Delete</button>
                                </form>
                            @endif
                        </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $games->links() }}
    @endif
</div>