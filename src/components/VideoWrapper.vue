<template>
  <div class="video-wrapper">
    <div class="video-container">
      <div class="video" v-if="isYTConsentPresent()">
        <iframe :src="video.src" allowfullscreen="" :alt="video.alt"></iframe>
      </div>
      <div class="video" v-else>
        <div class="overlay">
          <button @click="setYoutubeConsent()">
            Consent to Youtube cookies
          </button>
        </div>
        <img :src="getPlaceholderImg(placeholder.src)" :alt="placeholder.alt" />
      </div>
    </div>
  </div>
</template>

<script>
  import { getThumbnailImage } from "@/services/imageLoader.js";
  import {
    isYTConsentPresent,
    setYoutubeConsent,
  } from "@/services/cookieService.js";

  export default {
    name: "VideoWrapper",
    inject: ["videoPlaceholder"],
    props: {
      video: {
        type: Object,
        required: true,
      },
    },
    computed: {
      placeholder: function() {
        return this.videoPlaceholder;
      },
    },
    methods: {
      getPlaceholderImg: function(filename) {
        return getThumbnailImage(filename);
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
</style>
