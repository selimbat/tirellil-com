<template>
  <section>
    <div class="article-section" v-if="!isNestingTooDeep">
      <h5 v-if="hasTitle">{{ section.title }}</h5>
      <p v-if="isParagraph" v-html="beautifyText(section.content)"></p>
      <div class="img-container" v-if="isImage">
        <img :src="imgUrl(section.content.src)" :alt="section.content.alt" />
        <p class="img-annotation">{{ section.content.annotation }}</p>
      </div>
      <VideoWrapper v-if="isVideo" :video="section.content"></VideoWrapper>
      <div
        class="sub-sections-container"
        :class="{ mobile: mobileView }"
        v-if="isMultiple"
      >
        <ArticleSection
          v-for="(subSection, index) in section.sections"
          :key="index"
          :section="subSection"
          :mobileView="mobileView"
          :depth="depth + 1"
        ></ArticleSection>
      </div>
    </div>
    <div class="article-section" v-else>
      <span class="error"> Section nesting is too deep ({{ depth }}). </span>
    </div>
  </section>
</template>

<script>
  import VideoWrapper from "@/components/VideoWrapper.vue";
  import { beautifyText } from "@/services/syntaxParser.js";
  import { getArticleImage } from "@/services/imageLoader.js";

  const maxSupportedDepth = 2; // included

  export default {
    name: "ArticleSection",
    components: {
      VideoWrapper,
    },
    props: {
      section: {
        type: Object,
        required: true,
      },
      depth: {
        type: Number,
        default: 0,
      },
      mobileView: {
        type: Boolean,
        required: true,
        default: false,
      },
    },
    computed: {
      hasTitle: function() {
        return this.section && "title" in this.section;
      },
      isParagraph: function() {
        return (
          this.section &&
          (this.section.type === "paragraph" || this.section.type === "p")
        );
      },
      isImage: function() {
        return (
          this.section &&
          (this.section.type === "image" || this.section.type === "img")
        );
      },
      isVideo: function() {
        return this.section && this.section.type === "video";
      },
      isMultiple: function() {
        return (
          this.section &&
          (this.section.type === "multiple" || this.section.type === "many") &&
          this.section.sections &&
          this.section.sections.length > 0
        );
      },
      isNestingTooDeep: function() {
        return this.depth > maxSupportedDepth;
      },
    },
    methods: {
      imgUrl: function(filename) {
        return getArticleImage(filename);
      },
      beautifyText: function(text) {
        return beautifyText(text);
      },
    },
  };
</script>

<style lang="scss" scoped>
  .article-section {
    text-align: left;
    & > h5,
    & > p,
    & > div {
      margin: 1.3rem 0;
    }
    & > p {
      line-height: 150%;
    }
  }

  section:not(:first-of-type) > .article-section > h5 {
    margin-top: 2.5rem;
  }

  .sub-sections-container > section > .article-section > h5 {
    margin: 1.3rem 0;
  }

  .article-section > h5 {
    text-transform: uppercase;
    font-weight: 600;
  }

  .sub-sections-container {
    display: flex;
    align-items: center;
  }

  .sub-sections-container.mobile {
    flex-direction: column;
  }

  .sub-sections-container > * {
    width: 100%;
    margin: 0 0.5rem 0 0.5rem;
  }

  .img-container {
    text-align: center;
    position: relative;
  }

  .img-container > img {
    max-width: 100%;
  }

  .img-annotation {
    position: absolute;
    width: 100%;
    font-style: italic;
  }

  .error {
    color: red;
  }
</style>
