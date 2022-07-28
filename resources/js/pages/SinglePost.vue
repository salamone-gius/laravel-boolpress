<template>
    <div class="single-post">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <div class="post-box">
                <h1>{{post.title}}</h1>
                <h4>Author: {{post.user.name}}</h4>
                <!-- <div v-if="post.category.name">
                    <h4>Category: {{post.category.name}}</h4>
                </div> -->
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

    h4:last-of-type {
        margin-bottom: 2rem;
    }

    li {
        list-style: none;
        margin-bottom: 1.8rem;
    }

    .post-box{
        max-width: 70%;
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