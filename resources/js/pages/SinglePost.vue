<template>

    <!-- per risolvere l'errore dato dalla richiesta asincrona aggiungo un v-if (se/quando è presente post, stampa tutto)-->
    <div v-if="post" class="single-post">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="post-box">
                <h1>{{post.title}}</h1>
                <h4>Author: {{post.user.name}}</h4>
                <div v-if="post.category">
                    <h4>Category: {{post.category.name}}</h4>
                </div>
                <div v-if="post.tags.length > 0">
                    <div>
                        <h4>Tags:
                            <span v-for="tag in post.tags" :key="tag.id">
                                <router-link class="router-link" :to="{name: 'single-tag', params: {slug: tag.slug} }"> {{tag.name}} </router-link>
                            </span>
                        </h4>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <p>{{post.content}}</p>
                    <div style="width: 40%;">
                        <img v-if="post.image_path" :src="post.image_path" :alt="post.title" style="width: 100%; padding: 20px;">
                    </div>
                </div>
            </div>
            <router-link :to="{name: 'home'}" class="router-link">Return to all posts</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',

    data() {
        return {

            // imposto il singolo post con valore null
            post: null,
        }
    },

    created() {

        // imposto una chiamata Axios all'endpoint parametrico attraverso l'uso del template literal
        axios.get(`/api/posts/${this.$route.params.slug}`)

        .then((response) => {

            // assegno al singolo post il valore della risposta alla chiamata axios (response)
            this.post = response.data;
        })

        // se mi arriva una risposta negativa dal server...
        .catch((error) => {
            // ... faccio un redirect a Page404
            this.$router.push({name: 'page-404'});
        })
    },
}
</script>

<style lang="scss" scoped>
.single-post {
    padding: var(--section-padding);

    p {
        margin: 2rem 0;
    }

    li {
        list-style: none;
        margin-bottom: 1.8rem;
    }

    .post-box{
        max-width: 70%;
        min-width: 60%;
        background-color: white;
        padding: 1.5rem;
        border-radius: 1.25rem;
        box-shadow: 0 0 5px 2px gray;
        min-height: 21rem;

    }
    
    .router-link {
        margin-top: 5rem;
        text-decoration: none;

        &:hover {
            color: blueviolet;
        }
    }
}
</style>