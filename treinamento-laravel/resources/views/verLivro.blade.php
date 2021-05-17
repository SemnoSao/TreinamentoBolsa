<html>
    <body>
        <a href="{{ route('index.livro')}}" >Voltar ao Index</a> </br>
        <label>Livro </label> 
        <input type="text" name="nome" value="{{ $livro->nome }}"/> </br>
        <label>Autor </label> 
        <input type="text" name="autor" value="{{ $livro->autor }}"/>
    </body>
</html>