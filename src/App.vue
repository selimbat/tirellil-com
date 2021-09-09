<template>
  <div id="app">
    <Navigation :socials="socials" />
    <router-view />
    <Footer :socials="socials" />
  </div>
</template>

<script>
  import "@/reset.css";
  import "@/globals.css";

  import Navigation from "@/components/Navigation.vue";
  import Footer from "@/components/Footer.vue";

  export default {
    name: "App",
    components: {
      Navigation,
      Footer,
    },
    data() {
      return {
        socials: [
          {
            name: "Github",
            class: "github",
            url: "#",
          },
          {
            name: "LinkedIn",
            class: "linked-in",
            url: "#",
          },
          {
            name: "CodePen",
            class: "codepen",
            url: "#",
          },
          {
            name: "Shadertoy",
            class: "shadertoy",
            url: "#",
          },
        ],
      };
    },
    watch: {
      $route(to) {
        console.log(to);
        if (!to.meta.verticalScroll) {
          document.querySelector("body").style.overflowY = "hidden";
        } else {
          document.querySelector("body").style.overflowY = "visible";
        }
      },
    },
  };
</script>

<style lang="scss">
  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
  }
</style>
