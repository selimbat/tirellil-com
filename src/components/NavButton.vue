<template>
  <router-link class="nav-button" :to="route">{{ label }}</router-link>
</template>

<script>
  export default {
    name: "NavButton",
    props: {
      label: {
        type: String,
        required: true,
      },
      route: {
        type: String,
        required: true,
      },
    },
  };
</script>

<style scoped>
  .nav-button + .nav-button {
    margin-top: 1em;
  }
</style>
