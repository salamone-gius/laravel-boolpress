<template>
    <section  v-if="posts" class="post-section">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>All Posts</h1>
            <div>
                <ul class="row">
                    <!-- ciclo e stampo con Vue -->
                    <li class="col-4" v-for="post in posts" :key="post.slug">
                        <!-- passo le informazioni da un componente padre ad un componente figlio attraverso le props -->
                        <BaseCard :title="post.title" :content="post.content" :slug="post.slug"/>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>

// 'importo' i componenti
import BaseCard from '../commons/BaseCard.vue';

export default {
    name: 'PostsSection',

    // 'registro' i componenti importati
    components: {
        BaseCard,
    },

    // preparo l'ambiente per i dati che riceverò dalla chiamata axios
    data() {

        return {

            // inizializzo i post ad array vuoto
            posts: []
        }
    }, 

    // all'hook created() (al caricamento della pagina)...
    created() {

        // ...inserisco come parametro del metodo get() l'endpoint a cui fare la chiamata...
        axios.get('http://localhost:8000/api/posts')

        // ...quello che mi arriva (response)...
        .then((response) => {

            // ...lo salvo nella variabile 'posts' inizializzata precedentemente
            this.posts = response.data;
        })
        .catch((e) => {
            console.log(e);
        })
    }
}
</script>

<style lang="scss" scoped>
.post-section {
    padding: var(--section-padding);

    h1 {
        margin-bottom: 2rem;
        font-size: 2rem;
    }

    li {
        list-style: none;
        margin-bottom: 1.8rem;
    }
}
</style>