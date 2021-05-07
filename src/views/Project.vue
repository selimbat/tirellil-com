<template>
  <div class="project">
    <Banner>
      <h2>{{ isProjectLoaded ? project.title : filename }}</h2>
      <p>{{ tagsStr }}</p>
    </Banner>
    <Article v-if="isProjectLoaded" :sections="project.sections" :repository="project.repository"></Article>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";
import Article from "@/components/Article.vue";

export default {
  name: "Projects",
  props: {
    filename: {
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
    this.project = projects(`./${this.filename}.json`);
  },
};
</script>

<style scoped>
</style>