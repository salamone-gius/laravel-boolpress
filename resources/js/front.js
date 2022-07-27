// includo la libreria Vue.js
window.Vue = require('vue');

// importo axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// importo il componente principale della nostra applicazione 'App.vue'
import App from './views/App.vue';

// importo il nuovo oggetto router
import router from './router';

// renderizzo App all'avvio
const app = new Vue({
    el: '#app',
    render: h => h(App),

    // importo il router come terzo argomento del costruttore di Vue.js
    router,
});
