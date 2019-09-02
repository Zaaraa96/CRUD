<template>
  <div class="signin">
    <el-card>
      <h2>signin</h2>
      <el-form
        class="signin-form"
        :model="model"
        :rules="rules"
        ref="form"
        @submit.native.prevent="signin"
      >
        <el-form-item prop="username">
          <el-input
            v-model="model.username"
            placeholder="Username"
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
            :loading="loading"
            class="signin-button"
            type="primary"
            native-type="submit"
            block
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
      validCredentials: {
        username: "lightscope",
        password: "lightscope"
      },
      model: {
        username: "",
        password: ""
      },
      loading: false,
      rules: {
        username: [
          {
            required: true,
            message: "Username is required",
            trigger: "blur"
          },
          {
            min: 4,
            message: "Username length should be at least 5 characters",
            trigger: "blur"
          }
        ],
        password: [
          { required: true, message: "Password is required", trigger: "blur" },
          {
            min: 5,
            message: "Password length should be at least 5 characters",
            trigger: "blur"
          }
        ]
      }
    };
  },
  methods: {
    simulatesignin() {
      return new Promise(resolve => {
        setTimeout(resolve, 800);
      });
    },
    async signin() {
      let valid = await this.$refs.form.validate();
      if (!valid) {
        return;
      }
      this.loading = true;
      await this.simulatesignin();
      this.loading = false;
      if (
        this.model.username === this.validCredentials.username &&
        this.model.password === this.validCredentials.password
      ) {
        this.$message.success("signin successfull");
      } else {
        this.$message.error("Username or password is invalid");
      }
    }
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
