<template>
  <ResponsiveContainer
    :style="!mobileView ? 'position: fixed' : ''"
    @toggle-mobile-view="toggleMobileView"
  >
    <header>
      <slot name="header-top" v-if="!mobileView"></slot>
      <span v-if="!mobileView"></span>
      <slot name="header-bottom"></slot>
    </header>
  </ResponsiveContainer>
</template>

<script>
  import ResponsiveContainer from "@/components/ResponsiveContainer.vue";

  export default {
    name: "Header",
    components: {
      ResponsiveContainer,
    },
    data() {
      return {
        mobileView: false,
      };
    },
    methods: {
      toggleMobileView(mobileView) {
        this.mobileView = mobileView;
        this.$emit("toggle-mobile-view", mobileView);
      },
    },
  };
</script>

<style lang="scss" scoped>
  header > span {
    height: 1px;
    width: 98%;
    background-color: gray;
    content: ".";
    position: absolute;
    transform: translate(-50%, 0px);
  }
</style>
