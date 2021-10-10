<template>
  <Header
    class="header"
    :class="{ 'not-mobile': !mobileView, scrolled: scrolled }"
    @toggle-mobile-view="toggleMobileView"
  >
    <div slot="header-top" class="header-top">
      <ul class="infos">
        <li class="email">
          <Icon icon="envelope" />
          selim.tirellil@hotmail.fr
        </li>
        <li class="location">
          <Icon icon="map-marker-alt" />
          Paris, France
        </li>
      </ul>
      <ul class="socials">
        <li v-for="social in socials" :key="social.name" :class="social.class">
          <a :href="social.url" target="_blank" rel="external">
            {{ social.name }}
          </a>
        </li>
      </ul>
    </div>
    <div
      slot="header-bottom"
      class="header-bottom"
      :class="{ 'header-mobile': mobileView }"
    >
      <div class="title">
        <h1>Selim Tirellil</h1>
      </div>
      <ToggleMenuButton v-if="mobileView" @on-menu-toggle="toggleNav" />
      <div
        class="nav"
        :class="{
          'nav-mobile': mobileView,
          open: !mobileView || isMobileNavOpen,
        }"
      >
        <nav>
          <NavButton
            v-for="page in pages"
            :key="page.label"
            :label="page.label"
            :route="page.route"
          ></NavButton>
        </nav>
      </div>
    </div>
  </Header>
</template>

<script>
  import NavButton from "@/components/NavButton.vue";
  import Header from "@/components/Header.vue";
  import ToggleMenuButton from "@/components/ToggleMenuButton.vue";

  export default {
    name: "Navigation",
    components: {
      NavButton,
      Header,
      ToggleMenuButton,
    },
    props: {
      socials: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        pages: [
          {
            label: "ABOUT ME",
            route: "/",
          },
          {
            label: "PROJECTS",
            route: "/projects",
          },
          {
            label: "CONTACT",
            route: "/contact",
          },
        ],
        mobileView: false,
        isMobileNavOpen: false,
        scrolled: false,
      };
    },
    methods: {
      toggleMobileView(mobileView) {
        this.mobileView = mobileView;
      },
      toggleNav(value) {
        this.isMobileNavOpen = value;
      },
      updateScrollStyle() {
        this.scrolled = window.pageYOffset > 0.55 * window.innerHeight;
      },
    },
    created() {
      window.addEventListener("scroll", this.updateScrollStyle);
    },
    beforeDestroy() {
      window.removeEventListener("scroll", this.updateScrollStyle);
    },
  };
</script>

<style lang="scss" scoped>
  .header {
    z-index: 1;

    &.not-mobile {
      padding: 2rem 0 1rem 0;
      &.scrolled {
        padding-top: 1rem;
      }
    }

    &.scrolled {
      background-color: var(--header-dark-color);
    }

    &-top,
    &-bottom {
      display: flex;
      justify-content: center;
      align-items: flex-end;
    }

    &-top {
      font-size: 0.85rem;
      padding: 0 10px 15px 10px;
    }

    &-bottom {
      padding: 15px 10px 0 10px;
    }

    div:nth-of-type(1) {
      margin-right: auto;
    }
    h3 {
      margin: 0;
    }
    nav > a {
      text-decoration: none;
      font-size: 14px;
      padding: 0.5rem 1rem;
      border-radius: 0.125rem;
      transition: background-color 0.3s ease-in;
      color: var(--header-text-color);
      &.router-link-exact-active {
        color: #42b983;
      }
      &:not(:first-of-type) {
        margin-left: 0.25rem;
      }
      &:hover {
        background-color: rgba(226, 226, 226, 0.5);
      }
    }
  }

  .socials {
    list-style: disc inside none;
    margin-left: auto;
    display: flex;
  }

  .socials a {
    text-decoration: none;
    margin-left: -0.25rem;
  }

  .socials > li:not(:first-of-type) {
    padding-left: 1rem;
  }

  @mixin social-link($color) {
    a {
      transition: all 0.2s ease-in;
      color: var(--header-text-color);
    }
    &::marker {
      color: $color;
    }
    &:hover {
      a {
        color: $color;
      }
    }
  }

  .socials > .github {
    @include social-link(black);
  }

  .socials > .linked-in {
    @include social-link(rgb(0, 68, 255));
  }

  .socials > .shadertoy {
    @include social-link(rgb(236, 175, 6));
  }

  .socials > .codepen {
    @include social-link(rgb(0, 25, 165));
  }

  .infos {
    display: flex;
    font-size: 1.1em;
  }

  .infos > li + li {
    margin-left: 15px;
  }

  .email > svg,
  .location > svg {
    color: var(--accent-color);
  }

  .title,
  .infos,
  .nav {
    color: var(--header-text-color);
  }

  .title {
    font-size: 2rem;
  }

  .header-mobile {
    background-color: var(--header-dark-color);
    padding: 1em 1.5em 1em 1.5em;
    margin-left: 0;
    margin-right: 0;
    position: relative;
    flex-wrap: wrap;
    align-items: center;
    .nav-mobile {
      top: 100%;
      width: 94%;
      flex: 0 0 100%;
      overflow: hidden;
      max-height: 0;
      transition: max-height 0.25s ease-in;
      a:first-of-type {
        margin-top: 2em;
        margin-left: 0.25rem;
      }
    }

    .nav-mobile.open {
      max-height: 500px;
      transition: max-height 0.3s ease-in;
    }

    .nav > nav {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>
