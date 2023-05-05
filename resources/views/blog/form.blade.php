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
    <div class="form-group">
        <label class="form-label mt-4" for="category">Catégorie</label>
        <select class="form-control" name="category_id" id="category" @class(['form-control'])>
            <option value="">Sélectionner une catégorie</option>
            @foreach ($categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            {{ $message }}
        @enderror
    </div>

    @php
        $tagsIds = $post->tags()->pluck('id');
    @endphp
    <div class="form-group">
        <label class="form-label mt-4" for="tag">Tags</label>
        <select class="form-control" name="tags_id[]" id="tag" @class(['form-control']) multiple>
            @foreach ($tags as $tag)
                <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags_id')
            {{ $message }}
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
