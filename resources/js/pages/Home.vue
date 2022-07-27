<template>

    <!-- 'utilizzo' il componente registrato -->
    <PostsSection/>
</template>

<script>

// 'importo' il componente PostsSection
import PostsSection from '../components/sections/PostsSection.vue';

export default {
    name: 'Home',

    // 'registro' il componente importato
    components: {
        PostsSection,
    }
}
</script>

<style>

</style>