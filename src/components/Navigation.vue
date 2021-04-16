<template>
  <Header>
    <div slot="header-top" class="header-top">
      <ul class="infos">
        <li class="email">selim@tirellil.com</li>
        <li class="location">Paris, France</li>
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
.header-top,
.header-bottom {
  display: flex;
  justify-content: center;
  align-items: flex-end;
}

.header-top {
  padding: 0 10px 15px 10px;
  ul > li {
    display: inline;
  }
  ul + ul {
    margin-left: auto;
  }
  ul > li + li::before {
    content: " | ";
  }
}

.header-bottom {
  padding: 15px 10px 0 10px;
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
  a::before {
    background-color: green;
    content: ".";
    position: absolute;
    height: 5px;
    margin: -25px 0 0 -9px;
    border-radius: 50%;
    width: 5px;
    top: 50%;
  }
  .github > a::before {
    background-color: black;
  }
  .linked-in > a::before {
    background-color: blue;
  }
  .shadertoy > a::before {
    background-color: orange;
  }
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
</style>
