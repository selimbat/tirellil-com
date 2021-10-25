<template>
  <section>
    <div class="article-section" v-if="!isNestingTooDeep">
      <h5 v-if="hasTitle">{{ section.title }}</h5>
      <p v-if="isParagraph" v-html="beautifyText(section.content)"></p>
      <div class="img-container" v-if="isImage">
        <img
          :src="imgUrl(section.content.imgSrc)"
          :alt="section.content.imgAlt"
        />
        <p class="img-annotation">{{ section.content.annotation }}</p>
      </div>
      <div class="video-wrapper" v-if="isVideo">
        <div class="video-container">
          <div class="video" v-if="isYTConsentPresent()">
            <iframe :src="section.video.src" allowfullscreen=""></iframe>
          </div>
          <div class="video" v-else>
            <div class="overlay">
              <button @click="setYoutubeConsent()">
                Consent to Youtube cookies
              </button>
            </div>
            <img
              :src="videoPlaceholderImg(videoPlaceholder.imgSrc)"
              :alt="videoPlaceholder.imgAlt"
            />
          </div>
        </div>
      </div>
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
  import { beautifyText } from "@/services/syntaxParser.js";
  import {
    isYTConsentPresent,
    setYoutubeConsent,
  } from "@/services/cookieService.js";
  import {
    getArticleImage,
    getThumbnailImage,
  } from "@/services/imageLoader.js";

  const maxSupportedDepth = 2; // included

  export default {
    name: "ArticleSection",
    inject: ["videoPlaceholder"],
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
      videoPlaceholderImg: function(filename) {
        return getThumbnailImage(filename);
      },
      beautifyText: function(text) {
        return beautifyText(text);
      },
      isYTConsentPresent: function() {
        return isYTConsentPresent();
      },
      setYoutubeConsent: function() {
        setYoutubeConsent();
        this.$forceUpdate();
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
  }

  .img-container > img {
    max-width: 100%;
  }

  .img-annotation {
    font-style: italic;
  }

  .video-wrapper {
    display: flex;
    justify-content: center;
  }

  .video-container {
    flex-basis: 700px;
  }

  .video {
    position: relative;
    padding-top: calc(100% / (16 / 9));
    overflow: hidden;

    & > iframe {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
    }

    & > img,
    .overlay {
      position: absolute;
      width: 100%;
    }
    & > img {
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    & > .overlay {
      top: 0;
      left: 0;
      height: 100%;
      z-index: 10;
      background: linear-gradient(
        0deg,
        rgba(51, 55, 50, 0.8) 0%,
        rgba(255, 255, 255, 0) 100%
      );
      & > button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 1em;
        background-color: var(--accent-color);
        border-radius: 0.5em;
        border: 1px solid var(--accent-color-light);
        transition: all 0.3s;
        &:hover {
          background-color: var(--accent-color-light);
          border: 1px solid var(--accent-color);
        }
      }
    }
  }

  .error {
    color: red;
  }
</style>
