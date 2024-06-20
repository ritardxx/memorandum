<div class="mt-2">
        <form method="POST" action="{{ route('notes.store') }}">
            @csrf
        
            <div class="form-control mt-1">
                <textarea rows="2" name="note" class="input input-bordered w-full"></textarea>
            </div>
            <input type="hidden" name="game_id" value="{{ $game->id }}">
        
            <button type="submit" class="btn btn-primary btn-block normal-case mt-2">Post</button>
        </form>
    </div>