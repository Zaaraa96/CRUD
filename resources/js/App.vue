<template>
  <div>
    <router-link to='/dashboard'><el-button type="primary" plain> dashboard</el-button></router-link>
    <router-link to='/add' v-if="add"><el-button type="primary" plain >add to table</el-button></router-link>
    <router-link to='/login' v-if="loginshow"><el-button type="primary" plain >log in</el-button></router-link>
    <router-link to='/logout' v-if="logoutshow"><el-button type="primary" plain >log out</el-button></router-link>
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
        add: false,
        loginshow: true,
        logoutshow: false,
      }
    },
    components: {
      exampleComponent,
      signin,
      signout,
      dashboard,
    },
      mounted:function(){
        let level=localStorage.getItem('level');
        if(level==1){
          this.add=true;
        }
        if(level==2){
          this.add=true;
        }
        if(localStorage.getItem('api_token')!='')
        {
          this.logoutshow= true;
          this.loginshow= false;
        }else {
          this.logoutshow= false;
          this.loginshow= true;
        }
      },
    }

</script>
<style scoped>
  /* Add scoped styles */
  #app {
    padding: 20px;
  }
</style>
