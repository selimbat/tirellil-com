<template>
  <div class="project">
    <Banner>
      <h2>{{ title }}</h2>
      <p>Is this working?</p>
    </Banner>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";

export default {
  name: "Projects",
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  components: {
    Banner,
  },
  data() {
    return {
      project: {},
    };
  },
  created() {
    const projects = require.context("@/projects", false, /\.json$/);
    this.project = projects(`./${this.title}.json`);
    console.log(this.project);
  },
};
</script>

<style scoped>
</style>