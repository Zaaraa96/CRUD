<template>
  <div>
    <test test="salam"/>
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
  import test from './components/test.vue';

  export default {
    name: 'App',
    props: {
        'update-delete':Boolean,
        'folan':String
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
      test,
      dashboard,
    },

    mounted:function() {
    //  this.updatedelete= this.updatedeletee;
      console.log(this.folan);

    }
  };
</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
