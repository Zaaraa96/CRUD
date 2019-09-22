<template>
  <div class="signout">

    <el-card v-if="showlogout">
      <h2>sign out</h2>
      <h5>Are you sure you want to sign out?</h5>
      <el-form
        ref="form">
        <el-form-item>
          <el-button
            class="signout-button"
            type="primary"
             @click="logout"
            >yes</el-button>
            <el-button
              class="signout-button"
              type="primary"
              @click="dashboard"
              >no</el-button>
        </el-form-item>
      </el-form>
    </el-card>
    <el-card v-else>
      you are not logged in.
    </el-card>
  </div>
</template>

<script>
export default {
  name: "signout",
  data() {
    return {
      showlogout: false,
    };
  },
  methods:{
    logout() {
      localStorage.setItem('api_token','');
      window.location.replace("http://localhost:8000/login");
    },
    dashboard() {
      window.location.replace("http://localhost:8000/dashboard");
    },
  },
    mounted:function(){
      if(localStorage.getItem('api_token')!='')
      {
        this.showlogout= true;
      }else {
        this.showlogout= false;
      }
    },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
