const store = Vuex.createStore({
    state () {
        return{
            books: []
        }
    },
    getters: {
        headers (state) {
            if(state.books.length) return Object.keys(state.books[0]).filter(value => (value != "created_at" && value != "updated_at"));
            else return undefined
        }
    },
    mutations: {
        SET_Items (state, items) {
            state.books = items
        }
    },
    actions: {
        loadItems ({ commit }){
            axios
                .get('http://localhost/livros')
                .then(response => response.data)
                .then(items => commit('SET_Items', items))
        }
    }
});

const dbControl = Vue.createApp({
    data(){
        return {
            currentObj: {}
        }
    },
    mounted() {
        this.$store.dispatch('loadItems')
    },
    computed: {
        books() {
            return this.$store.state.books
        },
        headers() {
            return this.$store.getters.headers
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
                .then(response => (this.$store.commit('SET_Items', items)))
        },
        destroy: function(){
            axios
                .post('http://localhost/livro/'+this.currentObj['id']+'/excluir')
                .then(response => (this.$store.commit('SET_Items', items)))
        },
        update: function(){
            axios
                .post('http://localhost/livro/'+this.currentObj['id']+'/editar', 
                {
                   nome: this.currentObj['nome'],
                   autor: this.currentObj['autor']
                })
                .then(response => (this.$store.commit('SET_Items', items)))
        },
        link: function(event){
            for (i=0;i<this.$store.getters.headers.length;i++) this.currentObj[this.$store.getters.headers[i]] = event.target.parentElement.cells[i].innerHTML;
        }
    }
})

dbControl.use(store)
dbControl.mount('#dbControl')

