<template>
    <el-row :gutter="20">
       <el-col :span="8" :offset="4">
      <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
        <el-form-item label="host name" prop="name">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="IP" prop="name">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="collector" prop="name">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>

        <el-form-item label="asset value" prop="name"   v-if="assetValue">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="icon" prop="name"   v-if="icon">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="FQDN" prop="name"   v-if="FQDN">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="OS" prop="name"   v-if="OS">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="OS version" prop="name"   v-if="OSversion">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="CPU" prop="name"   v-if="CPU">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="CPU brand" prop="name"   v-if="CPUbrand">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="RAM" prop="name"   v-if="RAM">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="RAM brand" prop="name"   v-if="RAMbrand">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="MAC address" prop="name"   v-if="MACaddress">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="service" prop="name"   v-for="service in services">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="username" prop="name"   v-for="username in usernames">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="owner" prop="name"   v-for="owner in owners">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="location" prop="name"   v-if="location">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="software" prop="name"   v-for="software in softwares">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="H.D.D" prop="name"   v-if="HDD">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>
        <el-form-item label="H.D.D brand" prop="name"   v-if="HDDbrand">

        <el-input v-model="ruleForm.name"></el-input></el-form-item>

      </el-form>
      </el-col>
      <el-col :span="8">
        <el-row>
        <el-button round  @click="assetValue=true">asset value</el-button>
        <el-button round  @click="icon=true">icon</el-button>
        <el-button round  @click="FQDN=true">FQDN</el-button>
        <el-button round  @click="OS=true">OS</el-button>
      </el-row>

      <br>
      <el-row>
        <el-button round  @click="OSversion=true">OS version</el-button>
        <el-button round  @click="CPU=true">CPU</el-button>
        <el-button round  @click="CPUbrand=true">CPU brand</el-button>
        <el-button round  @click="RAM=true">RAM</el-button>
        </el-row>
        <br>
        <el-row>
        <el-button round  @click="RAMbrand=true">RAM brand</el-button>
        <el-button round  @click="MACaddress=true">MAC address</el-button>
        <el-button round  @click="services++">services({{services}})</el-button>
        </el-row>
        <br>
        <el-row>
          <el-button round  @click="usernames++">usernames({{usernames}})</el-button>
          <el-button round  @click="owners++">owners({{owners}})</el-button>
          <el-button round  @click="location=true">location</el-button>
          </el-row>
          <br>

          <el-row>
          <el-button round  @click="softwares++">softwares({{softwares}})</el-button>
          <el-button round  @click="HDD=true">H.D.D</el-button>
          <el-button round  @click="HDDbrand=true">H.D.D brand</el-button>
          </el-row>
          <br>
          </el-col>
    </el-row>

</template>

<script>
export default {

data() {
  return {
    assetValue: false,
    icon: false,
    FQDN:false,
    OS:false,
    OSversion:false,
    CPU:false,
    CPUbrand:false,
    RAM:false,
    RAMbrand:false,
    MACaddress:false,
    services:0,
    usernames:0,
    owners:0,
    location:false,
    softwares:0,
    HDD:false,
    HDDbrand:false,
    comp:'dynamic',
    links: [],
    state1: '',
    state2: '',

    ruleForm: {
      name: '',
      region: '',
      date1: '',
      date2: '',
      delivery: false,
      type: [],
      resource: '',
      desc: ''

    },
    rules: {
      name: [
        { required: false, message: 'Please input Activity name', trigger: 'blur' },
        { min: 3, max: 5, message: 'Length should be 3 to 5', trigger: 'blur' }
      ],
      region: [
        { required: true, message: 'Please select Activity zone', trigger: 'change' }
      ],
      date1: [
        { type: 'date', required: true, message: 'Please pick a date', trigger: 'change' }
      ],
      date2: [
        { type: 'date', required: true, message: 'Please pick a time', trigger: 'change' }
      ],
      type: [
            { type: 'array', required: true, message: 'Please select at least one activity type', trigger: 'change' }
          ],
          resource: [
            { required: true, message: 'Please select activity resource', trigger: 'change' }
          ],
          desc: [
            { required: true, message: 'Please input activity form', trigger: 'blur' }
          ]
        }
      };
    },
    methods: {
      addelement(){
        var form= document.createElement("el-form-item");
        var btn = document.createElement("el-input");
        document.getElementById("form").appendChild(form);
        document.getElementById("form").appendChild(btn);
      },
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            alert('submit!');
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      },
      querySearch(queryString, cb) {

        var links = [];
        for (let i = 0; i < this.links.length; i++) {
          if(!this.links[i].used)
            {
              links.push(this.links[i]);
            }
        }
        console.log(links);
        var results = queryString ? links.filter(this.createFilter(queryString)) : links;
        // call callback function to return suggestions
        cb(results);
      },
      createFilter(queryString) {
        return (link) => {
          return (link.value.toLowerCase().indexOf(queryString.toLowerCase()) === 0);
        };
      },
      loadAll() {
        return [
          { "value": "vue", "used": true },
          { "value": "element", "used": false},
          { "value": "cooking", "used": false },
          { "value": "mint-ui", "used": false },
          { "value": "vuex", "used": false},
          { "value": "vue-router", "used": false},
          { "value": "babel", "used": false}
         ];
      },
      handleSelect(item) {
        console.log(item);
      }
    },
    mounted() {
      this.links = this.loadAll();


    }

}


</script>
<style >
  #form{
    margin-left: 30%;
    width: 30%;
  }
  #buttons{
    margin-left: 5%;
    width: 30%;
    display: inline-block;
  }

</style>
