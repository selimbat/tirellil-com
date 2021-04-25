<template>
  <ResponsiveContainer style="position: fixed">
    <header>
      <slot name="header-top"></slot>
      <span></span>
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
