<template>
  <div id="app">
    <exampleComponent></exampleComponent>
  </div>
</template>
<script>
  import exampleComponent from './components/exampleComponent.vue';

  export default {
    name: 'app',
    data () {
      return {
        visible: false,
      }
    },
    components: {
      exampleComponent
    }
  };
</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
