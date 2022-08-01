{{-- estendo il layout app --}}
@extends('layouts.app')

{{-- scrivo il content --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$post->id}} - {{$post->title}}</h1>
            <div>
                {{-- avendo instaurato a livello di Model una relazione one to many (una categoria, più post), utilizzando i relativi metodi dei Model, posso portarmi appresso gli elementi (di altre tabelle) associati --}}
                {{-- richiamando la relazione one to many, ottengo anche le informazioni della categoria associata --}}
                @if ($post->category)
                    <h3>Category: {{$post->category->name}}</h3>
                @endif
            </div>
        </div>
        <div class="card-body d-flex justify-content-between">
            <div>{{$post->content}}</div>
            <div style="width: 40%;">
                @if($post->image)
                <img src="{{asset("storage/{$post->image}")}}" alt="" style="width: 100%;">
                @endif
            </div>
        </div>
        @if (count($post->tags) > 0)
        <div class="card-footer">
            <h5>Tags:</h5>
            <ul>
                @foreach ($post->tags as $tag)
                <li>{{$tag->name}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="d-flex justify-content-center align-items-center m-4">
        <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">Return to all posts</a>
    </div>
</div>
@endsection
