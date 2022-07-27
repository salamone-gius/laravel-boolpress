<template>
    <div class="page-404">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>Page not found!</h1>
            <!-- creo un link per tornare alla homepage -->
            <h2>
                <router-link :to="{name: 'home'}" class="router-link">♦ Return to homepage ♦</router-link>
            </h2>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Page404',
}
</script>

<style lang="scss" scoped>
.page-404 {
    background-color: var(--bg-section-light);
    padding: var(--section-padding);

    .container {
    width: 50%;

        h1 {
            margin-bottom: 2rem;
        }

        h2 {
            padding-bottom: 20rem;
        }

        .router-link {
            text-decoration: none;

            &:hover {
                color: blueviolet;
            }

        }
    }
}
</style>