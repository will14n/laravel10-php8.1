<h1>Listagem dos Suports</h1>

<a href="{{ route('supports.create') }}">Create</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th></th>
    </thead>
    <tbody>
        @if($supports)
            @foreach($supports as $support)
                <tr>
                    <td>{{$support->subject}}</td>
                    <td>{{$support->status}}</td>
                    <td>{{$support->description}}</td>
                    <td>
                        <a href="{{ route('supports.show', $support->id) }}">Ver</a>
                        <a href="{{ route('supports.edit', $support->id) }}">Editar</a>
                        <a href="{{ route('supports.destroy', $support->id) }}">Deletar</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>