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
                <div>
                    <ul v-if="post.comments.length > 0">
                        <h4 class="my-3">Comments:</h4>
                        <li v-for="comment in post.comments" :key="comment.id">
                            <div class="comment-box">
                                <h4 class="mb-2">Comment from {{comment.author ? comment.author : "Anonymous"}}:</h4>
                                <div>{{comment.content}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
                <div class="leave-a-comment mt-5">
                    <div>
                        <form @submit.prevent="addComment()" action="" class="d-flex flex-column justify-content-center align-items-center">
                            <h4 class="my-3">Leave a comment for this post</h4>
                            <div>
                                <input type="text" name="author" placeholder="Insert your name" v-model="formData.author">
                                <span>
                                    <ul v-if="errors.author">
                                        <!-- ciclo due volte poiché la struttura degli errors è: errors (oggetto) > errorMessages (array) > error (stringa)-->
                                        <li v-for="(errorMessages, index) in errors" :key="index">
                                            <div v-for="(error, index) in errorMessages" :key="index">
                                                <h3 style="color: red;">{{error}}</h3>
                                            </div>
                                        </li>
                                    </ul>
                                </span>
                            </div>
                            <div>
                                <textarea name="content" id="content" cols="30" rows="10" placeholder="Insert your comment" class="my-3" v-model="formData.content"></textarea>
                                <span>
                                    <ul v-if="errors.content">
                                        <!-- ciclo due volte poiché la struttura degli errors è: errors (oggetto) > errorMessages (array) > error (stringa)-->
                                        <li v-for="(errorMessages, index) in errors" :key="index">
                                            <div v-for="(error, index) in errorMessages" :key="index">
                                                <h3 style="color: red;">{{error}}</h3>
                                            </div>
                                        </li>
                                    </ul>
                                </span>
                            </div>
                            <div>
                                <button type="submit" class="p-2">Add Comment</button>
                            </div>
                            <div v-if="commentSent" class="mt-3" style="color: green; border: 1px solid green;">
                                <h4 style="text-align: center; padding: 10px;">Comment under approval</h4>
                            </div>
                        </form>
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

            // per trasferire i dati inseriti nel form dei commenti attraverso axios, devo salvarli nei data() settandoli come stringhe vuote e predispongo i campi da prendere (in html) attraverso il v-model
            formData: {
                author: '',
                content: '',
            },

            // salvo i messaggi di errore in un oggetto vuoto 'errors'
            errors: {},

            // setto l'informazione relativa al corretto inserimento del commento come 'false'
            commentSent: false,
        };
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

    methods: {

        // definisco il metodo che al submit farà la richiesta axios per spedire (POST) i dati al backoffice
        addComment() {

            // richiesta axios di tipo POST (axios.post) all'endpoint (`/api/comments/${this.post.id}`) che spedirà i dati del form (this.formData) a db
            axios.post(`/api/comments/${this.post.id}`, this.formData)

            .then((response) => {

                // cambio il valore della variabile commentSent in true in modo da mostrare il messaggio
                this.commentSent = true;
                
                // svuoto il form
                this.formData.author = '';
                this.formData.content = '';
            })

            // in caso di validazione fallita, salvo i messaggi di errore nella variabile 'errors'
            .catch((error) => {
                this.errors = error.response.data.errors;
            });
        },
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

    .post-box, .comment-box {
        padding: 1rem;
        border-radius: 1.25rem;
        box-shadow: 0 0 5px 2px gray;
    }

    .post-box {
        max-width: 70%;
        min-width: 60%;
        background-color: white;
        min-height: 21rem;
        padding: 1.5rem;
    }

    
    .router-link {
        margin-top: 5rem;
        text-decoration: none;

        &:hover {
            color: blueviolet;
        }
    }

    ::placeholder {
        text-align: center;
        padding: 10px;
    }
}
</style>