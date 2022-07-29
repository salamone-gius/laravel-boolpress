<template>
    <section class="categories-section">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>All Categories</h1>
            <ul v-if="categories.length > 0">
                <li v-for="category in categories" :key="category.id">
                    <router-link class="router-link" :to="{name: 'single-category', params: {slug: category.slug} }">
                        <h2>{{category.name}}</h2>
                    </router-link>
                </li>
            </ul>
            <h1 v-else>There are no categories</h1>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Categories',

    data() {
        return {

            // imposto le categorie ad array vuoto
            categories: [],
        }
    },

    created() {

        // con axios contatto l'endpoint
        axios.get('/api/categories')

        .then((response) => {

            // assegno la risposta dell'endpoint come valore dell'array categories
            this.categories = response.data;
        })
    }
}
</script>

<style lang="scss" scoped>
.categories-section {
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