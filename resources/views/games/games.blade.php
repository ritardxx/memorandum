<div class="mt-4">
    @if (isset($games))
        <ul class="list-none flex">
            @foreach ($games as $game)
                <li class="card w-96 bg-base-100 shadow-xl mr-2 ml-2">
                    <div class="card-body items-center text-center ">
                            {{-- game title --}}
                            <a class="card-title" href="{{ route('games.show', $game->id) }}">{!! nl2br(e($game->title)) !!}</a>
                        <div>
                            @if (Auth::id() == $game->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('games.destroy', $game->id) }}">
                                    @csrf
                                    @method('DELETE')
                                        <div class="card-actions mt-4">
                                            <button type="submit" class="btn btn-error btn-sm" 
                                                onclick="return confirm('Delete id = {{ $game->id }} ?')">Delete</button>
                                        </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{-- ページネーションのリンク --}}
        {{ $games->links() }}
    @endif
</div>