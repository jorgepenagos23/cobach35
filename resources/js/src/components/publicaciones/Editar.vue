<template>
  <div>
    <h2>Editar Publicación</h2>
    <form @submit="editarPublicacion">
      <label>Título</label>
      <input v-model="publicacion.titulo" />

      <label>Descripción</label>
      <textarea v-model="publicacion.descripcion"></textarea>

      <button type="submit">Guardar Cambios</button>
    </form>
  </div>
</template>

<script>

</script>
