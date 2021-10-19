<template>
  <div class="toggle-nav" @click="toggle" :class="{ open: isOpen }">
    <span></span>
  </div>
</template>

<script>
  export default {
    name: "ToggleMenuButton",
    data() {
      return {
        isOpen: false,
      };
    },
    methods: {
      toggle() {
        this.isOpen = !this.isOpen;
      },
    },
    watch: {
      isOpen() {
        this.$emit("on-menu-toggle", this.isOpen);
      },
      $route() {
        this.isOpen = false;
      },
    },
  };
</script>

<style lang="scss" scoped>
  .toggle-nav {
    cursor: pointer;
    position: relative;
    width: 1.7em;
    height: 1em;
    span {
      right: 1em;
      top: 50%;
      transform: translateX(1em);
    }
    span,
    span::before,
    span::after {
      width: 1.7em;
      height: 1px;
      background-color: #fff;
      position: absolute;
      transition: all 0.2s ease-in;
    }
    span::before,
    span::after {
      content: "";
      width: 80%;
      transition: all 0.3s linear;
    }
    span::before {
      right: 20%;
      top: -0.5em;
    }
    span::after {
      right: 0;
      top: 0.5em;
    }
  }
  .toggle-nav.open {
    span {
      background-color: transparent;
    }
    span::before,
    span::after {
      top: 0;
      width: 100%;
    }
    span::before {
      right: 0;
      transform: rotate(45deg);
    }
    span::after {
      transform: rotate(-45deg);
    }
  }
  @media (hover: hover) {
    .toggle-nav:hover {
      span::before,
      span::after {
        width: 100%;
      }
      span::before {
        right: 0;
      }
      &.open {
        span::before,
        span::after {
          transform: rotate(0deg);
        }
      }
    }
  }
</style>
