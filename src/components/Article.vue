<template>
  <ResponsiveContainer>
    <article class="article">
      <ArticleSection
        v-for="(section, index) in sections"
        :key="index"
        :section="section"
      ></ArticleSection>
    </article>
  </ResponsiveContainer>
</template>

<script>
import ArticleSection from "@/components/ArticleSection.vue";
import ResponsiveContainer from "@/components/ResponsiveContainer.vue";

export default {
  name: "Article",
  components: {
    ArticleSection,
    ResponsiveContainer,
  },
  props: {
    sections: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
</style>