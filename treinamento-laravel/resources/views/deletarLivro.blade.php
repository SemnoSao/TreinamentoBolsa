<html>
    <body>
    <a href="{{ route('index.livro')}}" >Voltar ao Index</a> </br>
    <fieldset> 
    <legend>Tem certeza que deseja excluir este livro?</legend>
        <form method="POST" action="{{ route('deletar.livro', ['id' => $livro->id]) }}"> 
            @csrf 
            <label>Autor </label> 
            <input type="text" name="nome" value="{{ $livro->nome }}"/> </br>
            <label>Autor </label> 
            <input type="text" name="autor" value="{{ $livro->autor }}"/> </br>
            <button>SIM</button>
        </form>
    </fieldset> 
    </body>
</html>