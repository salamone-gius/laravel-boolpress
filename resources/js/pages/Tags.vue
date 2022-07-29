<template>
    <section class="tags-section">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>All Tags</h1>
            <ul v-if="tags.length > 0">
                <li v-for="tag in tags" :key="tag.id">
                    <router-link class="router-link" :to="{name: 'single-tag', params: {slug: tag.slug} }">
                        <h2>{{tag.name}}</h2>
                    </router-link>
                </li>
            </ul>
            <h1 v-else>There are no tags</h1>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Tags',

    data() {
        return {

            // imposto i tag con valore di array vuoto
            tags: [],
        }
    },

    created() {

        // con axios contatto l'endpoint
        axios.get('/api/tags')

        .then((response) => {

            // assegno la risposta dell'endpoint come valore dell'array tags
            this.tags = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
.tags-section {
    background-color: var(--bg-section-light);
    padding: var(--section-padding);

    h1 {
        margin-bottom: 2rem;
        font-size: 2rem;
    }

    li {
        list-style: none;
        margin-bottom: 1.8rem;
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