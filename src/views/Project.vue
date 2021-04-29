<template>
  <div class="project">
    <Banner>
      <h2>{{ title }}</h2>
      <p>{{ tagsStr }}</p>
    </Banner>
    <Article v-if="isProjectLoaded" :sections="project.sections"></Article>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";
import Article from "@/components/Article.vue";

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
    Article,
  },
  data() {
    return {
      project: {},
    };
  },
  computed: {
    isProjectLoaded() {
      return this.project ? true : false;
    },
    tagsStr() {
      if (this.isProjectLoaded) {
        return this.project.techTags.reduce((agg, value) => `${agg}, ${value}`);
      } else {
        return "";
      }
    },
  },
  created() {
    const projects = require.context("@/projects", false, /\.json$/);
    this.project = projects(`./${this.title}.json`);
  },
};
</script>

<style scoped>
</style>