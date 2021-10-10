<template>
  <div class="action-wrapper">
    <a @click="callback()">
      {{ label }}
    </a>
  </div>
</template>

<script>
  export default {
    name: "ActionButton",
    props: {
      label: {
        type: String,
        required: true,
      },
      callback: {
        type: Function,
      },
    },
  };
</script>

<style lang="scss" scoped>
  .action-wrapper {
    margin-top: 3em;
    margin-bottom: 3em;
  }
  a {
    color: var(--accent-color);
    display: inline-block;
    width: 20ch;
    cursor: pointer;
    padding: 1em 2em;
    border-radius: 11% / 50%;
    border: 2px solid var(--accent-color);
    transition: all 0.3s;
    &:hover {
      color: white;
      background-color: var(--accent-color);
    }
  }
</style>
