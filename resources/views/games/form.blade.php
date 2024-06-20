
    <div class="mt-4">
        <form method="POST" action="{{ route('games.store') }}">
            @csrf
        
            <div class="form-control mt-4">
                <textarea rows="2" name="title" class="input input-bordered w-full"></textarea>
            </div>
        
            <button type="submit" class="btn btn-primary btn-block normal-case mt-2">Post</button>
        </form>
    </div>
