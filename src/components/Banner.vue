<template>
  <section>
    <div ref="parallax" class="parallax">
      <slot> </slot>
    </div>
  </section>
</template>

<script>
  export default {
    name: "Banner",
    methods: {
      parallax() {
        let slot = this.$refs.parallax;
        slot.style.transform = `translateY(${Math.min(
          0.7 * window.pageYOffset,
          230
        )}px)`;
        slot.style.opacity = 1 - 0.003 * window.pageYOffset;
      },
    },
    created() {
      window.addEventListener("scroll", this.parallax);
    },
    mounted() {
      this.parallax();
    },
    beforeDestroy() {
      window.removeEventListener("scroll", this.parallax);
    },
  };
</script>

<style lang="scss" scoped>
  section {
    width: 100%;
    height: calc(100vh - var(--footer-height));
    margin: auto;
    background-image: url("../assets/cgi-laser-balls.jpg");
    background-size: cover;
    background-position: top center;
    opacity: 0.75;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .parallax {
    font-size: 20px;
    * {
      color: lightgrey;
      mix-blend-mode: screen;
    }
    h2 {
      font-size: 2em;
      padding-bottom: 0.5em;
    }
  }
</style>
