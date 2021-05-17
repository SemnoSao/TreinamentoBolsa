<html>
    <body>
        <a href="{{ route('cadastrar.livro') }}" >Cadastar novo livro</a>
        <hr>
        @foreach($livro as $livro)
        <h3>{{ $livro->nome }}</h3>
        <p>{{ $livro->autor}}</p>
        <p>
            <a href="{{ route('mostrar.livro', $livro->id) }}" >Ver Livro</a>
            <a href="{{ route('editar.livro', $livro->id) }}" >Editar Livro</a>
            <a href="{{ route('excluir.livro', $livro->id) }}" >Excluir Livro</a>
        </p>
        <hr>
        @endforeach
    </body>
</html>