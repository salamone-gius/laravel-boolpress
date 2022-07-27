// importo Vue.js dalla node modules
import Vue from "vue";

// importo Vue router dalla node modules
import VueRouter from "vue-router";

// uso il metodo Vue.Use() che mi permette di aggiungere il plug-in VueRouter all'istanza di Vue.js
Vue.use(VueRouter);

// importo il componente che restituirà la pagina Home (si deve creare)
import Home from "./pages/Home";

// salvo nella const router il nuovo oggetto VueRouter partendo dalla classe VueRouter
const router = new VueRouter({

    // aggiungo la possibilità di navigare 'all'indietro'
    mode: "history",

    // aggiungo le rotte della parte frontoffice come array di oggetti. Ogni oggetto rappresenta una rotta frontoffice
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
    ],
});

// esporto il nuovo router
export default router;