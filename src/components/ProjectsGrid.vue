<template>
  <div class="flex-container">
    <Thumbnail
      v-for="project in projects"
      :key="project.title"
      :metadata="getThumbnailMetadata(project)"
    >
    </Thumbnail>
  </div>
</template>

<script>
import Thumbnail from "@/components/Thumbnail.vue";

export default {
  name: "ProjectsGrid",
  components: {
    Thumbnail,
  },
  data() {
    return {
      projects: [],
      areProjectsLoaded: false,
    };
  },
  created() {
    const projects = require.context("@/projects", false, /\.json$/);
    projects.keys().forEach((project) => {
      this.projects.push(projects(project));
    });
  },
  methods: {
    getThumbnailMetadata: function (project) {
      return {
        title: project.title,
        route: project.route,
        techTags: project.techTags,
        imgSrc: project.thumbnail.imgSrc,
        imgAlt: project.thumbnail.imgAlt,
      };
    },
  },
};
</script>

<style lang="scss" scoped>
.flex-container {
  display: flex;
  flex-wrap: wrap;
}

.flex-container > * {
  flex: 1 1 400px;
}
</style>