<template>
  <header>
    <div id="header-container" class="header-containter">
      <slot name="header-top"></slot>
      <span></span>
      <slot name="header-bottom"></slot>
    </div>
  </header>
</template>


<script>
export default {
  name: "Header",
  data() {
    return {
      maxWidth: 1140, // pixels
    };
  },
  computed: {
    mobileView() {
      return this.maxWidth < 800;
    },
  },
  watch: {
    maxWidth: function () {
      let container = document.getElementById("header-container");
      container.style.width = this.maxWidth + "px";
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
header {
  position: fixed;
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  span {
    height: 1px;
    width: 98%;
    background-color: gray;
    content: ".";
    position: absolute;
    transform: translate(-50%, 0px);
  }
}

.header-containter {
  width: 1140px;
  margin-right: auto;
  margin-left: auto;
  position: relative;
  transition: all 0.3s ease-out;
}
</style>
