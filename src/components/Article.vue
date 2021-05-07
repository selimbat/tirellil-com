<template>
  <ResponsiveContainer>
    <div class="repos-wrapper" v-if="repository">
      <a class="repos" target="_blank" :href="repository.url">{{ hostLabel }}</a>
    </div>

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
    repository: {
      type: Object
    }
  },
  computed:{
    hostLabel: function (){
      if (this.repository && this.repository.host) {
        return this.repository.host.substring(0, 1).toUpperCase() + this.repository.host.substring(1);
      }
      return "error";
    }
  }
};
</script>

<style lang="scss" scoped>

.repos-wrapper {
  display:inline-block;
  padding: 2rem 0 1rem 0;
  transition: transform 0.1s linear;
  &:hover {
  transform: translate(0, -8px);
    .repos {
      box-shadow: 0px 8px #444;
    }
  }
}

.repos {
  text-decoration:none;
  font-size: 2rem;
  background-color: black;
  color:white;
  padding: 1rem 1rem;
  border-radius: 0.6rem;
  box-shadow: 0px 0px #444;
  transition: box-shadow 0.1s linear;
}

</style>