<template>
  <div id="app">

    <router-link to='/dashboard'><el-button type="primary" plain> dashboard</el-button></router-link>
    <router-link to='/add'><el-button type="primary" plain >add to table</el-button></router-link>
    <br>
    <router-view></router-view>
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
        selectedComponent:dashboard,
      }
    },
    components: {
      exampleComponent,
      signin,
      dashboard,
    }
  };
</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
