<template>
  <footer>
    <div class="socials-wrapper">
      <ul class="socials">
        <li v-for="social in socials" :key="social.name" :class="social.class">
          <a :href="social.url">
            {{ social.name }}
          </a>
        </li>
      </ul>
    </div>
    <div class="sub-footer"></div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  props: {
    socials: {
      type: Array,
      required: true
    }
  }
}
</script>

<style lang="scss" scoped>
.socials-wrapper {
  background-color:#333;
  padding: 2em 0;
}

.sub-footer {
  height: 60px;
  background-color:#000;
}

.socials > li {
  margin: 1em 0 1em 0;
  a {
    position:relative;
    &::after{
      position:absolute;
      content:'';
      height:3px;
      top:100%;
      left:0;
      width:0;
      transition: all 0.3s ease-out;
      background-color: var(--accent-color);
    }
  }
  a:hover::after {
    width: 100%;
    left:0;
  }
}

a {
  text-decoration: none;
  color:#eff;
}
</style>
