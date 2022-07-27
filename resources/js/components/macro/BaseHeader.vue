<template>
    <header>
        <div class="header container">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col logo">
                    <h1>Boolpress</h1>
                </div>
                <nav class="col">
                    <ul class="d-flex justify-content-center align-items-center">
                        <li>
                            <!-- inserisco il router-link per la pagina Home -->
                            <router-link :to="{ name: 'home' }" class="router-link">Home</router-link>
                        </li>
                        <li>
                            <!-- inserisco il router-link per la pagina About -->
                            <router-link :to="{ name: 'about' }">About</router-link>
                        </li>
                    </ul>
                </nav>
                <div class="col restricted-area d-flex justify-content-end">
                    <!-- inserisco un link che conduce all'area di registrazione/autenticazione -->
                    <a href="/admin/home">Restricted Area (Admin)</a>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'BaseHeader',
}
</script>

<style lang="scss" scoped>
.header {
    padding: var(--header-padding);

    li {
        list-style: none;
        margin: 0 1rem;
    }

    .router-link, a {
        text-decoration: none;
        color: inherit;

        &:hover {
            color: blueviolet;
        }
    }
}
</style>