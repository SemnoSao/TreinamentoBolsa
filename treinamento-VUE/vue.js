const dbControl = Vue.createApp({
    data(){
        return {
            headers: [],
            books: [],
            currentObj: {}
        }
    },
    mounted() {
        axios
            .get('http://localhost/livros')
            .then(response => (this.books = response.data))
    },
    computed: {
        books: {
            set(){
                this.headers = Object.keys(this.books[1]).filter(function(value, index, arr){ 
                    return (value != "created_at" && value != "updated_at");
                });
            }
        }
    },
    methods: {
        create: function(){
            axios
                .post('http://localhost/livros/cadastrar', 
                {
                    nome: this.currentObj['nome'],
                    autor: this.currentObj['autor']
                })
                .then(response => (this.books = response.data))
        },
        destroy: function(){
            axios
                .post('http://localhost/livro/'+this.currentObj['id']+'/excluir')
                .then(response => (this.books = response.data))
        },
        update: function(){
            axios
                .post('http://localhost/livro/'+this.currentObj['id']+'/editar', 
                {
                   nome: this.currentObj['nome'],
                   autor: this.currentObj['autor']
                })
                .then(response => (this.books = response.data))
        },
        link: function(event){
            for (i=0;i<this.headers.length;i++) this.currentObj[this.headers[i]] = event.target.parentElement.cells[i].innerHTML;
        }
    }

})

dbControl.mount('#dbControl')

