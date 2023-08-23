<h1>Dúvida {{ $support->id }}</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
@endif

<form action="{{ route('supports.update', $support->id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject }}">
    <textarea name="body" cols="30" rows="3" placeholder="Descrição">{{ $support->body }}</textarea>
    <button type="submit">Enviar</button>
</form>