@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Comments to approve</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Post Title</th>
                        <th scope="col" class="text-center">Author</th>
                        <th scope="col" class="text-center">Content</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>

                            {{-- accedo alle informazioni del post associato attraverso il metodo post() definito nel Model Comment che instaura la relazione tra la tabella posts e la tabella comments --}}
                            <td>{{$comment->post->title}}</td>
                            <td>{{$comment->author}}</td>
                            <td>{{$comment->content}}</td>
                            <td style="min-width: 350px;">

                                {{-- creo un form con metodo POST la cui action è la spedizione dell'informazione alla rotta update per la modifica del campo 'is_approved' in true (approvazione del commento) --}}
                                <form action="{{route('admin.comments.update', $comment->id)}}" method="POST" class="d-inline-block">

                                    {{-- aggiungo il token di validazione --}}
                                    @csrf

                                    {{-- aggiungo il metodo PATCH perchè il campo da modificare è un solo (altrimenti PUT) --}}
                                    @method('PATCH')

                                    <button type="submit" href="" class="btn btn-success">Approve comment</button>

                                </form>

                                {{-- creo un form con metodo POST la cui action è la spedizione dell'informazione alla rotta destroy per la cancellazione del commento a db --}}
                                <form action="{{route('admin.comments.destroy', $comment->id)}}" method="POST" class="d-inline-block">

                                    {{-- aggiungo il token di validazione --}}
                                    @csrf

                                    {{-- aggiungo il metodo DELETE --}}
                                    @method('DELETE')

                                    <button type="submit" href="" class="btn btn-danger">Delete comment</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
