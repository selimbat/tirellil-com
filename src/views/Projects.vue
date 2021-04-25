<template>
  <div class="projects">
    <Banner>
      <h2>My projects</h2>
      <p>You can browse through all my recent projects</p>
    </Banner>
    <Thumbnail> </Thumbnail>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";
import Thumbnail from "@/components/Thumbnail.vue";

export default {
  name: "Projects",
  components: {
    Banner,
    Thumbnail,
  },
};
</script>

<style scoped>
</style>