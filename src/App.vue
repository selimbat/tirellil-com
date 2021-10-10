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
            url: "https://github.com/selimbat/",
          },
          {
            name: "LinkedIn",
            class: "linked-in",
            url: "https://www.linkedin.com/in/selim-tirellil/",
          },
          {
            name: "CodePen",
            class: "codepen",
            url: "https://codepen.io/tirellil",
          },
          {
            name: "Shadertoy",
            class: "shadertoy",
            url: "https://www.shadertoy.com/user/Atchafalaya",
          },
        ],
      };
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
