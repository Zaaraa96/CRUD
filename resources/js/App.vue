<template>
  <div>

    <router-link to='/dashboard'><el-button type="primary" plain> dashboard</el-button></router-link>
    <router-link to='/add'><el-button type="primary" plain >add to table</el-button></router-link>
    <router-link to='/login'><el-button type="primary" plain >login</el-button></router-link>
    <br>
    <router-view :updatedelete="pd"></router-view>
  </div>
</template>
<script type="text/javascript">
  import exampleComponent from './components/exampleComponent.vue';
  import signin from './components/signin.vue';
  import dashboard from './components/dashboard.vue';

  export default {
    name: 'App',
    props: {
        updatedeletee:Boolean,
      },
    data () {
      return {
        visible: false,
        selectedComponent:dashboard,
       pd: true,
      }
    },
    components: {
      exampleComponent,
      signin,
      dashboard,
    },

    mounted:function() {
    //  this.updatedelete= this.updatedeletee;
      console.log(this.updatedeletee);

    }
  };
</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
