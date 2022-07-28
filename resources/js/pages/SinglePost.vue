<template>
    <div class="single-post">
        <div class="container">
            <h1>{{post.title}}</h1>
            <p>{{post.content}}</p>
            <h4>Author: {{post.user.name}}</h4>
        </div>
        <div>
            <router-link :to="{name: 'home'}">Return to all posts</router-link>
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
    },
}
</script>

<style>

</style>