<html>
    <body>
    <a href="{{ route('index.livro')}}" >Voltar ao Index</a> </br>
    <fieldset> 
    <legend>Formulário de cadastro de livros</legend>
        <form method="POST" action="{{ route('salvar.livro') }}"> 
            @csrf
            <label>Livro</label> 
            <input type="text" name="nome"/>
            <label>Autor</label> 
            <input type="text" name="autor"/>
            <button>Cadastrar</button> 
        </form>
    </fieldset>
    </body>
</html>
