<template>
  <div class="wrapper">
    <router-link
      class="thumbnail"
      :to="metadata.route"
      @mouseover.native="hover = true"
      @mouseleave.native="hover = false"
      :class="{ showText: hover || mobileView }"
    >
      <img :src="imgUrl(metadata.img.src)" :alt="metadata.img.alt" />
      <div class="textArea">
        <p>{{ tagsStr }}</p>
        <h5>
          <strong>{{ metadata.title }}</strong>
        </h5>
      </div>
    </router-link>
  </div>
</template>

<script>
  import { getThumbnailImage } from "@/services/imageLoader.js";

  export default {
    name: "Thumbnail",
    props: {
      metadata: {
        type: Object,
        required: true,
      },
      mobileView: {
        type: Boolean,
        default: false,
      },
    },
    data() {
      return {
        hover: false,
      };
    },
    computed: {
      tagsStr: function() {
        return this.metadata.techTags
          .reduce((agg, tag) => agg + ", " + tag)
          .toUpperCase();
      },
    },
    methods: {
      imgUrl: function(filename) {
        return getThumbnailImage(filename);
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
    background-color: whitesmoke;
    opacity: 0;
    border-radius: 0.25rem;
    inset: auto 1rem 1rem 1rem;
    padding: 1rem 0;
    transition: opacity 0.3s linear;
    p {
      font-size: 0.9em;
      color: #555;
    }
    h5 {
      font-size: 1.2em;
      color: black;
    }
  }
  .thumbnail.showText,
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
