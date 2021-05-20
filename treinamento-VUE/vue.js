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
                this.currentObj = {}
                for(h in this.headers){
                    this.currentObj[h] = "a"
                }
            }
        }
    }

})

dbControl.mount('#dbControl')

