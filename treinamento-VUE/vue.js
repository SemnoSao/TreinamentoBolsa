db = [{"id":1, "nome": "O Nome do Vento", "autor": "Patrick Rothfuss"}, 
        {"id":2, "nome": "A Musica do Silencio", "autor": "Patrick Rothfuss"},
        {"id":3, "nome": "Deuses Americanos", "autor": "Neil Gaiman"}]

const dbControl = Vue.createApp({
    setup() {
        const headers = Object.keys(db[1])
        const books = db
        const currentObj = {}
        for(h in headers){
            currentObj[h] = ""
        }
        return {
            headers,
            books,
            currentObj
        }
    },
    computed:{
        currentObjisNew(){}
    }
})

dbControl.mount('#dbControl')

