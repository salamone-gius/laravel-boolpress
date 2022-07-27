<template>
    <div class="about-us">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h2>About us</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod numquam facere molestiae omnis corrupti dolorum qui enim quibusdam natus nostrum ullam eius, deleniti ratione libero atque, voluptatibus rem laboriosam similique.</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'About',
}
</script>

<style lang="scss" scoped>
.about-us {
    background-color: var(--bg-section-light);
    padding: var(--section-padding);

    .container {
    width: 50%;

        h2 {
            margin-bottom: 2rem;
        }

        p {
            text-align: justify;
            padding-bottom: 20rem;
        }
    }
}
</style>