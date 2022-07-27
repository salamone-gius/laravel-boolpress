// importo Vue.js dalla node modules
import Vue from "vue";

// importo Vue router dalla node modules
import VueRouter from "vue-router";

// uso il metodo Vue.Use() che mi permette di aggiungere il plug-in VueRouter all'istanza di Vue.js
Vue.use(VueRouter);

// importo il componente che restituirà la pagina Home (si deve creare)
import Home from "./pages/Home";

// importo il componente che restituirà la pagina About
import About from "./pages/About";

// importo il componente che restituirà la pagina Page404
import Page404 from "./pages/Page404";

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
        // aggiungo la rotta per visualizzare la pagina About appena creata in resources > js > pages
        {
            path: "/about",
            name: "about",
            component: About,
        },
        // aggiungo la rotta per visualizzare la pagina di errore 404 SEMPRE ALLA FINE (dopo aver cercato tra tutte le altre rotte)
        {
            // * = qualsiasi rotta/URI
            path: "/*",
            name: "page-404",
            component: Page404,
        },
    ],
});

// esporto il nuovo router
export default router;