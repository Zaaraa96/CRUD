<template>
    <el-row :gutter="20">
       <el-col :span="8" :offset="4">
         <el-form label-width="120px" class="demo-ruleForm">

           <el-form-item v-for="field in fields" v-if="field.show"
             :prop="field.prop"
             :label="field.label"
             :class="{invalid: $v.fields[field.prop].input.$error}"
           >
        <el-input class="multigroup" v-if="field.multi" v-for="(single,index) in field.num" v-model="field.input[index]" ></el-input>
        <el-input v-else v-model="field.input" @blur="$v.fields[field.prop].input.$touch()"></el-input>

        <p v-if="$v.fields[field.prop].input.$error"> {{field.message}}</p>
      </el-form-item>

        <el-button type="primary" @click="submit" :disabled="$v.$invalid">
          Submit</el-button>

      </el-form>
      </el-col>
      <el-col :span="8">

        <el-button class="buttons" round v-for="(field,index) in fields" v-if="field.buttonshow" @click="buttonclick(index)">
          <div v-if="field.multi">
            {{field.label}}({{field.num}})
          </div>
          <div v-else>
            {{field.label}}
          </div>
        </el-button>

          </el-col>
    </el-row>

</template>

<script>
import {required,numeric,ipAddress,macAddress,url} from 'vuelidate/lib/validators';
export default {

data() {
  return {
    fields:{
      hostname:{
        prop:"hostname",
        label:"Host name",
        show: true,
        buttonshow: false,
        multi: false,
        num: 1,
        message: " you have to enter a hostname",
        input: "",
      },
      IP:{
        prop:"IP",
        label:"IP address",
        show: true,
        buttonshow: false,
        multi: false,
        num: 1,
        message: "you have to enter a valid IP address",
        input: "",
      },
      collector:{
        prop:"collector",
        label:"collector",
        show: true,
        buttonshow: false,
        multi: false,
        num: 1,
        message: "",
        input: "",
      },
      asssetValue:{
        prop:"assetValue",
        label:"asset Value",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      icon:{
        prop:"icon",
        label:"icon",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "you have to enter a valid url",
        input: "",
      },
      FQND:{
        prop:"FQND",
        label:"FQND",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      OS:{
        prop:"OS",
        label:"OS",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      OSversion:{
        prop:"OSversion",
        label:"OS version",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "you have to enter a number",
        input: "",
      },
      CPU:{
        prop:"CPU",
        label:"CPU",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      CPUbrand:{
        prop:"CPUbrand",
        label:"CPU brand",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      RAM:{
        prop:"RAM",
        label:"RAM",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      RAMbrand:{
        prop:"RAMbrand",
        label:"RAM brand",
        show: false,
        buttonshow: true,
        multi: false,
        message: "",
        input: "",
      },
      MACaddress:{
        prop:"MACaddress",
        label:"MAC address",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "you have to enter a valid MAC address",
        input: "",
      },
      location:{
        prop:"location",
        label:"location",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      HDD:{
        prop:"HDD",
        label:"H.D.D",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      HDDbrand:{
        prop:"HDDbrand",
        label:"H.D.D brand",
        show: false,
        buttonshow: true,
        multi: false,
        num: 0,
        message: "",
        input: "",
      },
      services:{
        prop:"services",
        label:"services",
        show: false,
        buttonshow: true,
        multi: true,
        num: 0,
        message: "",
        input: [],
      },
      softwares:{
        prop:"softwares",
        label:"softwares",
        show: false,
        buttonshow: true,
        multi: true,
        num: 0,
        message: "",
        input: [],
      },
      usernames:{
        prop:"usernames",
        label:"user names",
        show: false,
        buttonshow: true,
        multi: true,
        num: 0,
        message: "",
        input: [],
      },
      owners:{
        prop:"owners",
        label:"owners",
        show: false,
        buttonshow: true,
        multi: true,
        num: 0,
        message: "",
        input: [],
      },
    },

    }},
    validations: {
      fields:{
        hostname: {
          input:{required,}
        },
        IP:{
          input:{ipAddress,}
        },
        icon: {
          input:{url,}
        },
        OSversion: {
          input:{numeric,}
        },
        MACaddress: {
          input:{macAddress:macAddress(':'),}
        },
        collector: {input:{},},
        assetValue: {input:{},},
        icon: {input:{},},
        FQND: {input:{},},
        OS: {input:{},},
        CPU: {input:{},},
        CPUbrand: {input:{},},
        RAM: {input:{},},
        RAMbrand: {input:{},},
        location: {input:{},},
        HDD: {input:{},},
        HDDbrand: {input:{},},
        services:{input:{},},
        owners:{input:{},},
        usernames:{input:{},},
        softwares:{input:{},},
      },

    },
    methods: {
      submit() {
        let host= {};
        for (var key in this.fields) {
          if (this.fields.hasOwnProperty(key)) {
            let field=this.fields[key];
            host[field.prop]= field.input;
          }
        }
        console.log(host);
            this.$http.post('/api/dashboard',host)
            .then(response=>{
              console.log(response);
            }, error =>{
              console.log(error);
            });
        window.location.replace("http://localhost:8000/dashboard");
      },
      buttonclick(index){
        this.fields[index].show=true;
        if(this.fields[index].multi)
        {
          this.fields[index].num++;
        }
        else {
          this.fields[index].num=1;
        }
      },
      },

}

</script>
<style >
  #form{
    margin-left: 30%;
    width: 30%;
  }
  .buttons{
    margin-left: 5%;
    margin-bottom: 3%;
    width: 30%;
    display: inline-block;
  }
  .invalid{
    color: red;
  }
  .multigroup{
    margin-bottom: 0.5%;
  }
</style>
