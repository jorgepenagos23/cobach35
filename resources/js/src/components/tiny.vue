<script setup>
import Editor from '@tinymce/tinymce-vue';

const editorConfig = {
  language: 'es', // Establece el idioma en español
  toolbar_mode: 'sliding',
  plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
  toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
