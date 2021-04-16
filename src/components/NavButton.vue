<template>
  <router-link :to="route">{{ label }}</router-link>
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
  a + a::before{
    content: "|";
    padding-inline: 1rem;
  }
</style>