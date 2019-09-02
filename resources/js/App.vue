<template>
  <div id="app">
    <signin />
    <br>
    <hr>
    <br>
    <dashboard />
    <br>
    <hr>
    <br>
    <exampleComponent></exampleComponent>
  </div>
</template>
<script>
  import exampleComponent from './components/exampleComponent.vue';
  import signin from './components/signin.vue';
  import dashboard from './components/dashboard.vue';

  export default {
    name: 'app',
    data () {
      return {
        visible: false,
      }
    },
    components: {
      exampleComponent,
      signin,
      dashboard
    }
  };
</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
