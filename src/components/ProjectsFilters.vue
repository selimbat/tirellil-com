<template>
  <div class="filters-container">
    <span
      class="filter"
      :class="{ active: !filters.some((f) => f.value) }"
      @click="resetFilters()"
    >
      all
    </span>
    <span
      class="filter"
      v-for="filter in filters"
      :key="filter.label"
      :class="{ active: filter.value }"
      @click="toggleFilter(filter.label)"
    >
      {{ filter.label }}
    </span>
  </div>
</template>

<script>
  export default {
    name: "ProjectsFilters",
    data() {
      return {
        filters: [
          {
            label: "web",
            value: false,
          },
          {
            label: "game",
            value: false,
          },
          {
            label: "ai",
            value: false,
          },
          {
            label: "graphics",
            value: false,
          },
        ],
      };
    },
    methods: {
      toggleFilter(label) {
        this.filters.forEach((filter) => {
          if (filter.label === label) {
            filter.value = !filter.value;
          } else {
            filter.value = false;
          }
        });
        this.notifyProjectsGrid();
      },
      resetFilters() {
        this.filters.forEach((filter) => (filter.value = false));
        this.notifyProjectsGrid();
      },
      notifyProjectsGrid() {
        this.$emit("filters-updated", this.filters);
      },
    },
  };
</script>

<style lang="scss" scoped>
  .filters-container {
    margin: 4em 0 2em 0;
  }

  .filter + .filter {
    margin-left: 1em;
  }

  .filter {
    color: #666;
    font-style: italic;
    cursor: pointer;
    position: relative;
    transition: color 0.3s ease-out;
    &::after {
      position: absolute;
      content: "";
      height: 3px;
      top: 100%;
      left: 0;
      width: 0;
      transition: all 0.3s ease-out;
      background-color: var(--accent-color);
    }
  }

  .filter.active {
    color: #000;
  }

  .filter.active::after,
  .filter:hover::after {
    width: calc(100% - 0.5ch);
    left: 0;
  }
</style>
