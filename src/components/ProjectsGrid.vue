<template>
  <ResponsiveContainer>
    <ProjectsFilters @filters-updated="registerFilter" />
    <div class="flex-container bottom-space">
      <div
        v-for="project in projects"
        :key="project.title"
        :class="{ filtered: shouldShowProject(project) }"
        class="thumbnail-wrapper"
      >
        <Thumbnail
          v-if="shouldShowProject(project)"
          :metadata="getThumbnailMetadata(project)"
        >
        </Thumbnail>
      </div>
    </div>
  </ResponsiveContainer>
</template>

<script>
  import Thumbnail from "@/components/Thumbnail.vue";
  import ProjectsFilters from "@/components/ProjectsFilters.vue";
  import ResponsiveContainer from "@/components/ResponsiveContainer.vue";

  export default {
    name: "ProjectsGrid",
    components: {
      Thumbnail,
      ResponsiveContainer,
      ProjectsFilters,
    },
    data() {
      return {
        projects: [],
        activeFilter: null,
      };
    },
    created() {
      const projects = require.context("@/projects", false, /\.json$/);
      projects.keys().forEach((project) => {
        this.projects.push(projects(project));
      });
      this.projects = this.projects.sort((p1, p2) => p1.index < p2.index);
      this.filteredProjects = this.projects;
    },
    methods: {
      getThumbnailMetadata: function(project) {
        return {
          title: project.title,
          route: project.route,
          techTags: project.techTags,
          imgSrc: project.thumbnail.imgSrc,
          imgAlt: project.thumbnail.imgAlt,
        };
      },
      registerFilter(filters) {
        let activeFilter = filters.find((f) => f.value);
        this.activeFilter = activeFilter?.label;
      },
      shouldShowProject(project) {
        if (this.activeFilter) {
          return (
            project.filterTags
              .map((t) => t.toLowerCase())
              .indexOf(this.activeFilter.toLowerCase()) >= 0
          );
        } else {
          return true;
        }
      },
    },
  };
</script>

<style lang="scss" scoped>
  .flex-container {
    display: flex;
    flex-wrap: wrap;
  }

  .flex-container > .filtered {
    flex: 1 1 350px;
  }

  .bottom-space {
    margin-bottom: 4em;
  }
</style>
