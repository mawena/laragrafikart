<form action="" method="post">
    @csrf
    @method($post->id ? 'PATCH' : 'POST')
    <div class="form-group">
        <label class="form-label mt-4" for="title">Titre</label>
        <input type="text" name="title" id="title" placeholder="Mon titre" value="{{ old('title', $post->title) }}"
            @class(['form-control', 'is-invalid' => $errors->get('title')])>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label mt-4" for="slug">Slug</label>
        <input type="text" name="slug" id="slug" placeholder="Mon slug"
            value="{{ old('slug', $post->slug) }}" @class(['form-control', 'is-invalid' => $errors->get('slug')])>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label class="form-label mt-4" for="content">Contenu</label>
        <textarea name="content" id="content" rows="5" placeholder="Mon contenu" @class(['form-control', 'is-invalid' => $errors->get('content')])>{{ old('content', $post->content) }}</textarea>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <br>
    <button class="btn btn-primary">
        @if ($post->id)
            Modifier
        @else
            Enregistrer
        @endif
    </button>
    <br>
    <br>
</form>
