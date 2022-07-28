<template>
    <div class="base-card">

        <!-- utilizzo le props definite -->
        <h2>{{title}}</h2>
        <p class="card-content">
            {{content}}
        </p>

        <!-- per inserire una rotta parametrica nel router-link, inserisco params: {prop:proprietà} come secondo parametro -->
        <router-link :to="{name: 'single-post', params: {slug:slug} }" class="router-link">Read more</router-link>
    </div>
</template>

<script>
export default {
    name: 'BaseCard',

    // definisco le props che arrivano dal componente padre
    props: {
        title: {
            type: String
        },

        content: {
            type: String
        },

        slug: {
            type: String
        },
    },
}
</script>

<style lang="scss" scoped>
.base-card {
    background-color: white;
    padding: 1.5rem;
    border-radius: 1.25rem;
    box-shadow: 0 0 5px 2px gray;
    min-height: 21rem;

    p {
        margin: 1rem 0;
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