<template>
  <div>
    <router-link to='/dashboard'><el-button type="primary" plain> dashboard</el-button></router-link>
    <router-link to='/add'><el-button type="primary" plain >add to table</el-button></router-link>
    <router-link to='/login'><el-button type="primary" plain >log in</el-button></router-link>
    <router-link to='/logout'><el-button type="primary" plain >log out</el-button></router-link>
    <br>
    <router-view></router-view>
  </div>
</template>
<script type="text/javascript">
  import exampleComponent from './components/exampleComponent.vue';
  import signin from './components/signin.vue';
  import signout from './components/signout.vue';
  import dashboard from './components/dashboard.vue';

  export default {
    name: 'App',
    props: {
      },
    data () {
      return {

      }
    },
    components: {
      exampleComponent,
      signin,
      signout,
      dashboard,
    },

    }

</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
