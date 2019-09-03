<template>
  <div id="app">
    <el-button type="primary" plain @click="selectedComponent='signin'">sign in</el-button>
    <el-button type="primary" plain @click="selectedComponent='dashboard'">dashboard</el-button>
    <el-button type="primary" plain @click="selectedComponent='exampleComponent'">add to table</el-button>
    <br>
    <component :is="selectedComponent"> </component>
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
        selectedComponent:signin,
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
