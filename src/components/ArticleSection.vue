<template>
  <section>
    <div class="article-section" v-if="!isNestingTooDeep">
      <h5 v-if="hasTitle">{{ section.title }}</h5>
      <p v-if="isParagraph">{{ section.content }}</p>
      <div class="img-container" v-if="isImage">
        <img
          :src="imgUrl(section.content.imgSrc)"
          :alt="section.content.imgAlt"
        />
        <p class="img-annotation">{{ section.content.annotation }}</p>
      </div>
      <div class="sub-sections-container" v-if="isMultiple">
        <ArticleSection
          v-for="(subSection, index) in section.sections"
          :key="index"
          :section="subSection"
          :depth="depth + 1"
        ></ArticleSection>
      </div>
    </div>
    <div class="article-section" v-else>
      <span class="depth-error">
        Section nesting is too deep ({{ depth }}).
      </span>
    </div>
  </section>
</template>

<script>
const maxSupportedDepth = 2; // included
var images = require.context("../assets/projects/", false, /\.(png|jpg)$/);

export default {
  name: "ArticleSection",
  props: {
    section: {
      type: Object,
      required: true,
    },
    depth: {
      type: Number,
      default: 0,
    },
  },
  computed: {
    hasTitle: function () {
      return this.section && "title" in this.section;
    },
    isParagraph: function () {
      return (
        this.section &&
        this.section.type &&
        (this.section.type === "paragraph" || this.section.type === "p")
      );
    },
    isImage: function () {
      return (
        this.section &&
        this.section.type &&
        (this.section.type === "image" || this.section.type === "img")
      );
    },
    isMultiple: function () {
      return (
        this.section &&
        this.section.type &&
        (this.section.type === "multiple" || this.section.type === "many") &&
        this.section.sections &&
        this.section.sections.length > 0
      );
    },
    isNestingTooDeep: function () {
      return this.depth > maxSupportedDepth;
    },
  },
  methods: {
    imgUrl: function (path) {
      if (images.keys().indexOf("./" + path) >= 0) {
        return images("./" + path);
      } else {
        return images("./dodeca1.png"); // TODO: change to a real error image
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.article-section {
  text-align: left;
}
.article-section > h5,
.article-section > p,
.article-section > div {
  margin: 1rem 0;
}

.article-section > h5 {
  text-transform: uppercase;
  font-weight: 600;
}

.sub-sections-container {
  display: flex;
}

.sub-sections-container > * {
  width: 100%;
  margin: 0 0.5rem 0 0.5rem;
}

.img-container {
  text-align: center;
}

.img-container > img {
  max-width: 100%;
}

.img-annotation {
  font-style: italic;
}
</style>