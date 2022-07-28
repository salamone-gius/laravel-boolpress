<template>
    <div class="single-post">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="post-box">
                <h1>{{post.title}}</h1>
                <h4>Author: {{post.user.name}}</h4>
                <div v-if="post.category">
                    <h4>Category: {{post.category.name}}</h4>
                </div>
                <p>{{post.content}}</p>
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
    },
}
</script>

<style lang="scss" scoped>
.single-post {
    background-color: var(--bg-section-light);
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