<h1>Nova Dúvida</h1>

<form action="{{ route('supports.store') }}" method="post">
    @csrf
    <input type="text" name="subject" placeholder="Assunto">
    <textarea name="body" cols="30" rows="3" placeholder="Descrição"></textarea>
    <button type="submit">Enviar</button>
</form>