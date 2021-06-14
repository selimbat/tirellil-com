<template>
  <Header class="header" @toggle-mobile-view="toggleMobileView">
    <div slot="header-top" class="header-top">
      <ul class="infos">
        <li class="email">
          <Icon icon="envelope" />
          selim@tirellil.com
        </li>
        <li class="location">
          <Icon icon="map-marker-alt" />
          Paris, France
        </li>
      </ul>
      <ul class="socials">
        <li v-for="social in socials" :key="social.name" :class="social.class">
          <a :href="social.url">
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
            label: "HOME",
            route: "/",
          },
          {
            label: "ABOUT ME",
            route: "/about",
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
      };
    },
    methods: {
      toggleMobileView(mobileView) {
        this.mobileView = mobileView;
      },
      toggleNav(value) {
        this.isMobileNavOpen = value;
      },
    },
  };
</script>

<style lang="scss" scoped>
  .header {
    z-index: 1;

    &-top,
    &-bottom {
      display: flex;
      justify-content: center;
      align-items: flex-end;
    }

    &-top {
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
      font-weight: bold;
      color: #2c3e50;
      &.router-link-exact-active {
        color: #42b983;
      }
    }
  }

  .socials {
    list-style: disc inside none;
    margin-left: auto;
    margin-right: -13px;
    display: flex;
  }

  .socials a {
    text-decoration: none;
    margin: 0 13px 0 -13px;
  }

  @mixin social-link($color) {
    a {
      transition: all 0.2s ease-in;
      color: white;
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
  }

  .infos > li + li {
    margin-left: 15px;
  }

  .email > svg,
  .location > svg {
    color: var(--accent-color);
  }

  .header-mobile {
    background-color: #000;
    padding: 1em 1.5em 1em 1.5em;
    margin-left: 0;
    margin-right: 0;
    position: relative;
    flex-wrap: wrap;
    .nav-mobile {
      top: 100%;
      width: 94%;
      background-color: #000;
      flex: 0 0 100%;
      overflow: hidden;
      max-height: 0;
      transition: max-height 0.25s ease-in;
      a:first-of-type {
        padding-top: 2em;
      }
      a:last-of-type {
        padding-bottom: 1em;
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
