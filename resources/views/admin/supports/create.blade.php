<h1>Nova Dúvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
@endif

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="3" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>