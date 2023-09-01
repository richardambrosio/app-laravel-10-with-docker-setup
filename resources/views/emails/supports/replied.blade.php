<x-mail::message>
# Dúvida respondida

Olá, Fulano!
Sua dúvida {{ $reply->support_id }} foi respondida com {{ $reply->content }}

<x-mail::button :url="route('replies.index', $reply->support_id)">
Ver
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
