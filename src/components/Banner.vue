<template>
  <section>
    <div class="parallax">
      <slot> </slot>
    </div>
  </section>
</template>

<script>
export default {
  name: "Banner",
  methods: {
    parallax() {
      let slot = document.getElementsByClassName("parallax")[0];
      slot.style.transform = `translateY(${0.7 * window.pageYOffset}px)`;
    },
  },
  created() {
    window.addEventListener("scroll", this.parallax);
  },
  beforeDestroy() {
    window.removeEventListener("scroll", this.parallax);
  },
};
</script>

<style lang="scss" scoped>
section {
  width: 100%;
  height: 520px;
  margin: auto;
  background-image: url("../assets/cgi-laser-balls.jpg");
  background-size: cover;
  background-position: top center;
  opacity: 0.75;
  display: flex;
  justify-content: center;
  align-items: center;
}

.parallax * {
  color: lightgrey;
  mix-blend-mode: screen;
}
</style>