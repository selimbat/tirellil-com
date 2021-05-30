<template>
  <div ref="container" class="container">
    <slot></slot>
  </div>
</template>

<script>
  export default {
    name: "ResponsiveContainer",
    props: {
      isHeader: {
        type: Boolean,
        default: false,
      },
    },
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
        // FIXME there must be a better way
        if (window.innerWidth > 1200) {
          this.maxWidth = 1140;
        } else if (window.innerWidth > 992) {
          this.maxWidth = 960;
        } else if (window.innerWidth > 768) {
          this.maxWidth = 720;
        } else if (window.innerWidth > 576) {
          this.maxWidth = 540;
        } else {
          this.maxWidth = window.innerWidth - 30;
        }
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
