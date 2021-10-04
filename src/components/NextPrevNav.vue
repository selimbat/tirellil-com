<template>
  <nav class="next-prev">
    <router-link
      :to="nextRoute ? nextRoute : ''"
      class="next"
      :class="{ disabled: nextRoute == null }"
    >
      newer
      <div class="on-hover" v-if="nextRoute != null">
        <Icon icon="angle-left" />
        <span>next project</span>
      </div>
    </router-link>
    <span class="oblique-sep"></span>
    <router-link
      :to="prevRoute ? prevRoute : ''"
      class="prev"
      :class="{ disabled: prevRoute == null }"
    >
      older
      <div class="on-hover" v-if="prevRoute != null">
        <span>previous project</span>
        <Icon icon="angle-right" />
      </div>
    </router-link>
  </nav>
</template>

<script>
  export default {
    name: "NextPrevNav",
    props: {
      nextRoute: {
        type: String,
        default: null,
      },
      prevRoute: {
        type: String,
        default: null,
      },
    },
  };
</script>

<style scoped lang="scss">
  .next-prev {
    position: relative;
    height: 8em;
    width: 22em;
    margin-right: auto;
    margin-left: auto;
    margin-bottom: 3em;
    display: inline-block;
    & > .disabled {
      cursor: default;
    }
  }
  .next,
  .prev {
    position: absolute;
    font-family: "JetBrains Mono", monospace;
    font-size: 40px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #999;
    text-decoration: none;
    transition: color 0.2s ease-in;
    .on-hover {
      font-size: 15px;
      position: absolute;
      color: #000;
      transition: all 0.2s ease-in;
      opacity: 0;
      svg {
        color: var(--accent-color);
      }
    }
    &:hover:not(.disabled) {
      color: #000;
      .on-hover {
        opacity: 1;
        transform: translateY(0);
        svg {
          color: var(--accent-color);
        }
      }
    }
  }
  .next {
    left: 2.5rem;
    top: 0;
    .on-hover {
      top: 100%;
      left: -2em;
      text-align: left;
      svg {
        padding-right: 0.5ch;
      }
    }
    &:not(:hover) {
      .on-hover {
        transform: translateY(100%);
      }
    }
  }
  .prev {
    right: 2.5rem;
    bottom: 0;
    .on-hover {
      bottom: 100%;
      right: -4em;
      text-align: right;
      svg {
        padding-left: 0.5ch;
      }
    }
    &:not(:hover) {
      .on-hover {
        transform: translateY(-100%);
      }
    }
  }
  .oblique-sep {
    content: "";
    background-color: #999;
    position: absolute;
    height: 100%;
    width: 1px;
    transform: rotate(15deg);
  }
</style>
