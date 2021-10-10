<template>
  <div class="projects">
    <Banner>
      <h2>My projects</h2>
      <p>You can browse through all my recent projects</p>
    </Banner>
    <section>
      <ProjectsGrid> </ProjectsGrid>
    </section>
  </div>
</template>

<script>
  import Banner from "@/components/Banner.vue";
  import ProjectsGrid from "@/components/ProjectsGrid.vue";

  export default {
    name: "Projects",
    components: {
      Banner,
      ProjectsGrid,
    },
  };
</script>

<style scoped></style>
