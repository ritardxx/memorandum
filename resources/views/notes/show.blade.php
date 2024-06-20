@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-2 sm:gap-10">
        <aside class="mt-4">
            {{-- ゲーム情報 --}}
            @include('games.card')
        </aside>
         {{-- ノート一覧 --}}
         @include('notes.notes')
    </div>
@endsection