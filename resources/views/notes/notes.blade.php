<div class="mt-4">
    <div class="sm:col-span-2 mt-2">
            {{-- 投稿フォーム --}}
            @include('notes.form')
        </div>
    @if (isset($notes))
        <ul class="list-none">
            @foreach ($notes as $note)
                <li class="flex mb-4 card bg-base-100 shadow-xl">
                        <div class="card-body">
                             @if (Auth::id() == $note->user_id)
                                {{-- 投稿削除ボタンのフォーム --}}
                                <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="card-actions justify-end">
                                        <button type="submit" class="btn btn-error btn-sm btn-square" 
                                            onclick="return confirm('Delete id = {{ $note->id }} ?')"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg></button>
                                    </div>
                                </form>
                            @endif
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($note->note)) !!}</p>
                            <small>{{ $note->created_at }}</small>
                        </div>
                       
                </li>
            @endforeach
        </ul>
    @endif
</div>