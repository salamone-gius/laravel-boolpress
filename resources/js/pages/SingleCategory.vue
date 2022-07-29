<template>
    <div class="single-category">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <template v-if="category.posts.length > 0">
                <div v-if="category" class="category-box">
                    <h1>All posts with "{{category.name}}" category:</h1>
                    <ul>
                        <li v-for="post in category.posts" :key="post.id">
                            <router-link class="router-link" :to="{name: 'single-post', params: {slug: post.slug} }">
                                <h4>{{post.title}}</h4>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </template>
            <div v-else>
                <h2>There are no related posts</h2>
            </div>
            <router-link :to="{name: 'categories'}" class="router-link">Return to all categories</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SingleCategory',

    data() {
        return {
            category: null,
        }
    },

    created() {

        // imposto una chiamata Axios all'endpoint parametrico attraverso l'uso del template literal
        axios.get(`/api/categories/${this.$route.params.slug}`)

        .then((response) => {

            // assegno alla singola categoria il valore della risposta alla chiamata axios (response)
            this.category = response.data;
        })
    }

}
</script>

<style lang="scss" scoped>
.single-category {
    background-color: var(--bg-section-light);
    padding: var(--section-padding);

    p {
        margin: 2rem 0;
    }

    li {
        margin: 1.8rem 0;
        margin-left: 2rem;
    }

    .category-box{
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