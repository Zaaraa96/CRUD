<template>
  <div class="signin">
    <el-card>
      <h2>signin</h2>
      <el-form
        class="signin-form"
        ref="form"
      >
        <el-form-item prop="email">
          <el-input
            v-model="model.email"
            placeholder="Email"
            prefix-icon="fas fa-user"
          >
          </el-input>
        </el-form-item>
        <el-form-item prop="password">
          <el-input
            v-model="model.password"
            placeholder="Password"
            type="password"
            prefix-icon="fas fa-lock"
          >
          </el-input>
        </el-form-item>
        <el-form-item>
          <el-button
            class="signin-button"
            type="primary"
            native-type="submit"
            block @click="submit"
            >signin</el-button
          >
        </el-form-item>
        <a class="forgot-password" href="https://oxfordinformatics.com/"
          >Forgot password ?</a
        >
      </el-form>
    </el-card>
  </div>
</template>

<script>
export default {
  name: "signin",
  data() {
    return {

      model: {
        email: "",
        password: ""
      },

      rules: {
        email: [
          {
            required: true,
            message: "Username is required",
            trigger: "blur"
          },
        ],
        password: [
          { required: true, message: "Password is required", trigger: "blur" },
        ]
      }
    };
  },
  methods: {
    submit() {
          let user={};
          user.email= model.email;
          user.password= model.password;
          this.$http.post('/login',user)
          .then(token=>{
            console.log(token);
          }, error =>{
            console.log(error);
          });
      window.location.replace("http://localhost:8000/dashboard");
    },
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.signin {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.signin-button {
  width: 100%;
  margin-top: 40px;
}
.signin-form {
  width: 290px;
}
.forgot-password {
  margin-top: 10px;
}
</style>
<style lang="scss">
$teal: rgb(0, 124, 137);
.el-button--primary {
  background: $teal;
  border-color: $teal;

  &:hover,
  &.active,
  &:focus {
    background: lighten($teal, 7);
    border-color: lighten($teal, 7);
  }
}
.signin .el-input__inner:hover {
  border-color: $teal;
}
.signin .el-input__prefix {
  background: rgb(238, 237, 234);
  left: 0;
  height: calc(100% - 2px);
  left: 1px;
  top: 1px;
  border-radius: 3px;
  .el-input__icon {
    width: 30px;
  }
}
.signin .el-input input {
  padding-left: 35px;
}
.signin .el-card {
  padding-top: 0;
  padding-bottom: 30px;
}
h2 {
  font-family: "Open Sans";
  letter-spacing: 1px;
  font-family: Roboto, sans-serif;
  padding-bottom: 20px;
}
a {
  color: $teal;
  text-decoration: none;
  &:hover,
  &:active,
  &:focus {
    color: lighten($teal, 7);
  }
}
.signin .el-card {
  width: 340px;
  display: flex;
  justify-content: center;
}
</style>
