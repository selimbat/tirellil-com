<template>
  <div class="project">
    <Banner>
      <h2>{{ $route.params.title }}</h2>
      <p>Is this working?</p>
    </Banner>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";

export default {
  name: "Projects",
  components: {
    Banner,
  },
};
</script>

<style scoped>
</style>