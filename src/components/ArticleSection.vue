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
    beautifyText: function (text) {
      const boldSymbol = "**";
      const boldTags = { opening: "<strong>", closing: "</strong>" };
      const linkSymbol = "~~";
      const linkTags = { opening: (url) => `<a href="${url}">`, closing: "</a>"};

      let boldIndex = { opening: text.indexOf(boldSymbol), closing: -1 };
      let linkIndex = { opening: text.indexOf(linkSymbol), closing: -1 };

      let ctr = 0;
      while (boldIndex.opening >= 0 || linkIndex.opening >= 0) {
        if (boldIndex.opening >= 0) {
          boldIndex.closing = text.indexOf(boldSymbol, boldIndex.opening + boldSymbol.length);
        }
        if (linkIndex.opening >= 0) {
          linkIndex.closing = text.indexOf(linkSymbol, linkIndex.opening + linkSymbol.length);
        }
        if ((boldIndex.opening - linkIndex.opening) * (boldIndex.closing - linkIndex.opening) * (boldIndex.opening - linkIndex.closing) * (boldIndex.closing - linkIndex.closing) < 0){
          // tags intersect. Not supported
          return "<span style=\"color: red\">Error when formatting text. Bold and link tags intersect.</span>"
        }
        
        if (boldIndex.closing > 0 && (linkIndex.closing < 0 || boldIndex.closing < linkIndex.closing)) {
          text = text.replace(boldSymbol, boldTags.opening).replace(boldSymbol, boldTags.closing);
          boldIndex.opening = text.indexOf(boldSymbol);
          boldIndex.closing = -1;
        }
        else if (linkIndex.closing > 0 && (boldIndex.closing < 0 || linkIndex.closing < boldIndex.closing)) {
          let urlStart = text.indexOf("[", linkIndex.opening + linkSymbol.length);
          let urlEnd = -1;
          let url = "#";
          if (urlStart >= 0){
            urlEnd = text.indexOf("]", urlStart);
            if (urlEnd >= 0){
              url = text.substring(urlStart + 1, urlEnd);
              text = text.replace(`[${url}]`, "");
            }
          }
          text = text.replace(linkSymbol, linkTags.opening(url)).replace(linkSymbol, linkTags.closing);
          linkIndex.opening = text.indexOf(linkSymbol);
          linkIndex.closing = -1;
        }
        if (ctr > 50) break; // should never happen
        ctr++;
      }
      return text;
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