<template>
  <div class="wrapper">
    <router-link class="thumbnail" :to="metadata.route">
      <img :src="imgUrl(metadata.imgSrc)" :alt="metadata.imgAlt" />
      <div class="textArea">
        <p>{{ tagsStr }}</p>
        <h5>{{ metadata.title }}</h5>
      </div>
    </router-link>
  </div>
</template>

<script>
var images = require.context(
  "../assets/project-thumbnails/",
  false,
  /\.(png|jpg)$/
);

export default {
  name: "Thumbnail",
  props: {
    metadata: {
      type: Object,
      required: true,
    },
  },
  computed: {
    tagsStr: function () {
      return this.metadata.techTags
        .reduce((agg, tag) => agg + ", " + tag)
        .toUpperCase();
    },
  },
  methods: {
    imgUrl: function (path) {
      return images("./" + path);
    },
  },
};
</script>

<style lang="scss" scoped>
.wrapper {
  justify-content: center;
  align-items: center;
  overflow: hidden;
  border-radius: 0.25rem;
  margin: 0.5rem 0.75rem;
}

.thumbnail {
  width: 100%;
  display: inline-block;
  position: relative;
  padding-top: calc(100% / (16 / 9));
}

img {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
  z-index: -1;
}
.textArea {
  position: absolute;
  display: block;
  background-color: antiquewhite;
  opacity: 0;
  border-radius: 0.25rem;
  bottom: 1rem;
  left: 1rem;
  right: 1rem;
  padding: 1rem 0;
  transition: opacity 0.3s linear;
}
.thumbnail:hover,
.thumbnail:focus {
  .textArea {
    opacity: 0.8;
  }
}

.thumbnail:focus {
  .textArea {
    outline: black solid 1px;
  }
}
</style>