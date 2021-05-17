<html>
    <body>
        <a href="{{ route('index.livro')}}" >Voltar ao Index</a> </br>
        <form method="POST" action="{{ route('atualizar.livro', ['id' => $livro->id]) }}"> 
            @csrf
            <label>Livro </label> 
            <input type="text" name="nome" value="{{ $livro->nome }}"/> </br>
            <label>Autor </label> 
            <input type="text" name="autor" value="{{ $livro->autor }}"/> </br>
            <button>Salvar</button>
        </form>
    </body>
</html>