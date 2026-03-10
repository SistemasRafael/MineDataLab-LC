<x-layout>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="{{ $post->exists ? route('posts.update', $post) : route('posts.store') }}">
                @csrf
                @if($post->exists) 
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>User Name</label>
                    <input name="user_name" class="form-control" value="{{ old('user_name', $post->user_name) }}">
                    @error('user_name') <div>{{ $message }}</div> @enderror
                </div>

                {{-- <div class="form-group">
                    <label>Contenido</label>
                    <textarea name="content" class="form-control">{{ old('content', $post->content) }}</textarea>
                    @error('content') <div>{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="draft" @selected(old('status', $post->status) === 'draft')>Borrador</option>
                        <option value="published" @selected(old('status', $post->status) === 'published')>Publicado</option>
                    </select>
                    @error('status') <div>{{ $message }}</div> @enderror
                </div> --}}

                <button class="btn btn-primary mt-2">{{ $post->exists ? 'Actualizar' : 'Crear' }}</button>
            </form>
        </div>
    </div>
</x-layout>