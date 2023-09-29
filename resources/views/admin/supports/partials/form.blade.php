@csrf()
<input type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}" />
<textarea name="description" cols="30" rows="5" placeholder="Descrição">{{ $support->subject ?? old('description') }}</textarea>
<button type="submit">Enviar</button>