<template>
    <main>
        <router-view></router-view>
        <!-- 'utilizzo' le sezioni del main registrate
        <PostsSection/> -->
    </main>
</template>

<script>

// 'importo' le sezioni del main
// import PostsSection from '../sections/PostsSection.vue';

export default {
    name: 'BaseMain',

    // // 'registro' le sezioni del main importate
    // components: {
    //     PostsSection,
    // }
}
</script>

<style lang="scss" scoped>
main {
    height: 80vh;
    width: 100%;
    overflow-y: scroll;
    background-color: var(--bg-section-light);
}
</style>