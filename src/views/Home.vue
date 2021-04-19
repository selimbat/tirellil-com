<template>
  <div class="home">
    <Banner>
      <h2>I'm a software engineer</h2>
    </Banner>
    <ResponsiveContainer>
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
      <img alt="Vue logo" src="../assets/logo.png" />
    </ResponsiveContainer>
  </div>
</template>

<script>
import Banner from "@/components/Banner.vue";
import ResponsiveContainer from "@/components/ResponsiveContainer.vue";

export default {
  name: "Home",
  components: {
    Banner,
    ResponsiveContainer,
  },
};
</script>

<style scoped>
</style>