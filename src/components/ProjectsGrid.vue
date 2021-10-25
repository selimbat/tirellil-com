<template>
  <ResponsiveContainer
    @screen-changed="screenChanged"
    @toggle-mobile-view="(v) => (mobileView = v)"
  >
    <ProjectsFilters @filters-updated="registerFilter" />
    <div class="flex-container bottom-space">
      <div
        v-for="project in projects"
        :key="project.title"
        :class="[
          nbProjectsPerRowClass,
          shouldShowProject(project) ? 'filtered' : '',
        ]"
        class="thumbnail-wrapper"
      >
        <Thumbnail
          v-if="shouldShowProject(project)"
          :metadata="getThumbnailMetadata(project)"
          :mobileView="mobileView"
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
        nbProjectsPerRow: 3,
        mobileView: false,
      };
    },
    computed: {
      nbProjectsPerRowClass() {
        return `row-${this.nbProjectsPerRow}`;
      },
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
          img: {
            src: project.thumbnail.src,
            alt: project.thumbnail.alt,
          },
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
      screenChanged(screen) {
        switch (screen) {
          case "lg":
            this.nbProjectsPerRow = 3;
            break;
          case "md":
          case "sm":
            this.nbProjectsPerRow = 2;
            break;
          case "xs":
            this.nbProjectsPerRow = 1;
            break;
        }
      },
    },
  };
</script>

<style lang="scss" scoped>
  .flex-container {
    display: flex;
    flex-wrap: wrap;
    & > .filtered {
      flex-shrink: 1;
      &.row-1 {
        flex-basis: 100%;
      }
      &.row-2 {
        flex-basis: 50%;
      }
      &.row-3 {
        flex-basis: 33.33%;
      }
    }
  }

  .bottom-space {
    margin-bottom: 4em;
  }
</style>
