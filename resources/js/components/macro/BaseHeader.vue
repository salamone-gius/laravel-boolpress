<template>
    <header>
        <div class="header container">
            <div class="row">
                <div class="col logo">
                    <h1>Boolpress</h1>
                </div>
                <div class="col">
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
}
</style>