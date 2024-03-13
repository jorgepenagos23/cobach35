<script setup>
import Editor from '@tinymce/tinymce-vue';

const editorConfig = {
  language: 'es', // Establece el idioma en español
  toolbar_mode: 'sliding',
  plugins: 'table powepaste list media paste',
  toolbar: 'undo redo | styleselect |bold italic | alignleft | alignleft aligncenter alignright',
  
  tinycomments_mode: 'embedded',
  tinycomments_author: 'Author name',
  mergetags_list: [
    { value: 'First.Name', title: 'First Name' },
    { value: 'Email', title: 'Email' },
  ],
  ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
};

const apiKey = 'vgvm9x4wbo925nbtlkqal2wmuebfvsqvb8lgq99i2rumla9w';
const initialValue = '¡Bienvenido a TinyMCE!';
</script>

<template>
  <main id="sample">
    <Editor :api-key="apiKey" :init="editorConfig" :initial-value="initialValue" />
  </main>
</template>

<style scoped>
@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 100%;
  }
}
</style>
