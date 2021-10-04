<template>
  <div class="container-wrapper">
    <div ref="container" class="container">
      <slot></slot>
    </div>
  </div>
</template>

<script>
  const windowSizes = [
    {
      threshold: 1200,
      width: 1140,
    },
    {
      threshold: 992,
      width: 960,
    },
    {
      threshold: 768,
      width: 720,
    },
    {
      threshold: 576,
      width: 540,
    },
  ];

  export default {
    name: "ResponsiveContainer",
    data() {
      return {
        maxWidth: 1140, // pixels
        mobileView: false,
      };
    },
    watch: {
      maxWidth: function() {
        let container = this.$refs.container;
        this.mobileView = this.maxWidth <= 720;
        if (this.mobileView) {
          container.style.width = "100vw";
        } else {
          container.style.width = this.maxWidth + "px";
        }
      },
      mobileView: function() {
        this.$emit("toggle-mobile-view", this.mobileView);
      },
    },
    methods: {
      adjustWidth() {
        let size;
        for (let i = 0; i < windowSizes.length; i++) {
          if (window.innerWidth > windowSizes[i].threshold) {
            if (!size || size.threshold < windowSizes[i].threshold) {
              size = windowSizes[i];
            }
          }
        }
        this.maxWidth = size ? size.width : window.innerWidth - 30;
      },
    },
    created() {
      this.adjustWidth();
      window.addEventListener("resize", this.adjustWidth);
    },
    beforeDestroy() {
      window.removeEventListener("resize", this.adjustWidth);
    },
  };
</script>

<style lang="scss" scoped>
  .container-wrapper {
    width: 100%;
    transition: all 0.3s ease-out;
  }
  .container {
    width: 1140px;
    margin-right: auto;
    margin-left: auto;
    left: 0;
    right: 0;
    position: relative;
    transition: all 0.3s ease-out;
  }
</style>
