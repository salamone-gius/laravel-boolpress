@component('mail::message')
# Nuovo commento da approvare (markdown)

Post commentato: {{$comment->post->title}}

@component('mail::button', ['url' => route('admin.comments.index')])
Vai ai commenti da approvare
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
