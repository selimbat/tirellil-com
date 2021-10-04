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
      screenType: "lg",
      mobileView: false,
    },
    {
      threshold: 992,
      width: 960,
      screenType: "md",
      mobileView: false,
    },
    {
      threshold: 768,
      width: 720,
      screenType: "sm",
      mobileView: true,
    },
    {
      threshold: 576,
      width: 540,
      screenType: "xs",
      mobileView: true,
    },
  ];

  export default {
    name: "ResponsiveContainer",
    data() {
      return {
        windowSize: Math.max.apply(
          Math,
          windowSizes.map((s) => s.threshold)
        ),
      };
    },
    watch: {
      windowSize: function() {
        let container = this.$refs.container;
        if (this.windowSize.mobileView) {
          container.style.width = "100%";
        } else {
          container.style.width = this.windowSize.width + "px";
        }
        this.$emit("toggle-mobile-view", this.windowSize.mobileView);
        this.$emit(`screen-changed`, this.windowSize.screenType);
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
        this.windowSize = size
          ? size
          : {
              threshold: window.innerWidth,
              width: window.innerWidth - 30,
              screenType: "xs",
              mobileView: true,
            };
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
