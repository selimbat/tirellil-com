<template>
  <div class="contact">
    <Banner>
      <h2>Get in touch</h2>
      <p>Tell me about your project</p>
    </Banner>
    <section>
      <ActionButton label="Download my resume" :callback="downloadResume" />
      <ActionButton label="Email me" :callback="openMailClient" />
    </section>
  </div>
</template>

<script>
  import Banner from "@/components/Banner.vue";
  import ActionButton from "@/components/ActionButton.vue";

  export default {
    name: "Contact",
    components: {
      Banner,
      ActionButton,
    },
    methods: {
      openMailClient() {
        window.open(
          "mailto:selim.tirellil@hotmail.fr?subject=Contact from tirellil.com"
        );
      },
      downloadResume() {
        window.open("/resume.pdf", "resizable,scrollbars");
      },
    },
  };
</script>
