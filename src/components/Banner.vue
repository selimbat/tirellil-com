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
  width: 90vw;
  height: 70vh;
  margin: auto;
  background: yellow;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>