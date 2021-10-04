<template>
  <div class="project">
    <Banner>
      <h2>{{ isProjectLoaded ? project.title : filename }}</h2>
      <p>{{ tagsStr }}</p>
    </Banner>
    <Article
      v-if="isProjectLoaded"
      :sections="project.sections"
      :repository="project.repository"
      :nextArticleRoute="nextProjectRoute"
      :prevArticleRoute="prevProjectRoute"
    ></Article>
  </div>
</template>

<script>
  import Banner from "@/components/Banner.vue";
  import Article from "@/components/Article.vue";

  export default {
    name: "Project",
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
        prevProjectRoute: null,
        nextProjectRoute: null,
      };
    },
    computed: {
      isProjectLoaded() {
        return this.project ? true : false;
      },
      tagsStr() {
        if (this.isProjectLoaded) {
          return this.project.techTags.reduce(
            (agg, value) => `${agg}, ${value}`
          );
        } else {
          return "";
        }
      },
    },
    methods: {
      populate(filename) {
        const projects = require.context("@/projects", false, /\.json$/);
        let orderedProjects = [];
        projects.keys().forEach((key) => {
          orderedProjects.push({
            filename: key,
            json: projects(key),
          });
        });
        orderedProjects.sort((a, b) => a.json.index - b.json.index);
        let projectIndex = orderedProjects.findIndex(
          (o) => o.filename == `./${filename}.json`
        );
        if (projectIndex >= 0) {
          this.project = orderedProjects[projectIndex].json;
          this.prevProjectRoute =
            projectIndex - 1 >= 0
              ? orderedProjects[projectIndex - 1].json.route
              : null;
          this.nextProjectRoute =
            projectIndex + 1 < orderedProjects.length
              ? orderedProjects[projectIndex + 1].json.route
              : null;
        } else {
          this.project = projects(`./${filename}.json`);
        }
      },
    },
    beforeRouteUpdate(to, from, next) {
      this.populate(to.params.filename);
      next();
    },
    created() {
      this.populate(this.filename);
    },
  };
</script>

<style scoped></style>
