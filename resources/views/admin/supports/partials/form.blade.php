@csrf
    <input type="text" name="subject" placeholder="Assunto" value="{{ $support->subject ?? old('subject') }}">
    <textarea name="body" cols="30" rows="3" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
    <button type="submit">Enviar</button>