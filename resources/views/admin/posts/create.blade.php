@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create new post</h1>
        </div>
        <div class="card-body">
            <form action="{{route('admin.posts.index')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                {{-- si potrebbe aggiungere la WYSIWYG ckeditor (textarea con possibilit√† di personalizzare il testo), ma poi i dati che ritornerebbero sarebbero troppo complessi da gestire (per il momento)  --}}
                {{-- <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="ckeditor form-control" id="content" name="content"></textarea>
                </div> --}}
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{old('content')}}</textarea>
                    @error('content')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    {{-- come attributo name inserisco il nome della colonna che mette in relazione la tabella posts con la tabella categories (foreign key) --}}
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category" name="category_id">
                        <option value="">Select category</option>
                        {{-- ciclo le categorie e inserisco l'id delle categorie nel value di option --}}
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                {{-- aggiungo la possibilit√† all'utente di aggiungere un tag al nuovo post --}}
                <div class="form-group">
                    <p>Tags</p>
                    @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        {{-- in caso di checbox multiple devo stare attento al name del tag input (come array) --}}
                        <input class="form-check-input @error('tags') is-invalid @enderror" type="checkbox" id="{{$tag->slug}}" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
                    </div>
                    @error('tags')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @endforeach
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old('published') ? 'checked' : ''}}>
                    <label class="form-check-label" for="published">Post</label>
                    @error('published')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Return to all posts</a>
    </div>
</div>
    
@endsection

{{-- aggiungo lo script per istanziare la WYSIWYG ckeditor (textarea con possibilit√† di personalizzare il testo) --}}
{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script> --}}