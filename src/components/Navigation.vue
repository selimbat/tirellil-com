<template>
  <Header class="header">
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
        <li class="github"><a href="#">Github</a></li>
        <li class="linked-in"><a href="#">LinkedIn</a></li>
        <li class="shadertoy"><a href="#">Shadertoy</a></li>
      </ul>
    </div>
    <div slot="header-bottom" class="header-bottom">
      <div>
        <h1>Selim Tirellil</h1>
      </div>
      <div>
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

export default {
  name: "Navigation",
  components: {
    NavButton,
    Header,
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
    };
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

.github::marker {
  background-color: black;
}
.linked-in::marker {
  background-color: blue;
}
.shadertoy::marker {
  background-color: orange;
}

.socials > .github {
  color: black;
}

.socials > .linked-in {
  color: blue;
}

.socials > .shadertoy {
  color: orange;
}

.infos {
  display: flex;
}

.infos > li + li {
  margin-left: 15px;
}

.email > svg,
.location > svg {
  color: var(--primary-color);
}
</style>
