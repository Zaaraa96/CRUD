<template>
    <el-row :gutter="20">
       <el-col :span="8" :offset="4">
      <el-form  :rules="rules" label-width="120px" class="demo-ruleForm">
        <el-form-item label="host name" prop="hostname">

        <el-input v-model="host.hostname"></el-input></el-form-item>
        <el-form-item label="IP" prop="IP">

        <el-input v-model="host.IP"></el-input></el-form-item>
        <el-form-item label="collector" prop="collector">

        <el-input v-model="host.collector"></el-input></el-form-item>

        <el-form-item label="asset value" prop="assetValue"   v-if="assetValue">

        <el-input v-model="host.assetValue"></el-input></el-form-item>
        <el-form-item label="icon" prop="icon"   v-if="icon">

        <el-input v-model="host.icon"></el-input></el-form-item>
        <el-form-item label="FQND" prop="FQND"   v-if="FQND">

        <el-input v-model="host.FQND"></el-input></el-form-item>
        <el-form-item label="OS" prop="OS"   v-if="OS">

        <el-input v-model="host.OS"></el-input></el-form-item>
        <el-form-item label="OS version" prop="OSversion"   v-if="OSversion">

        <el-input v-model="host.OSversion"></el-input></el-form-item>
        <el-form-item label="CPU" prop="CPU"   v-if="CPU">

        <el-input v-model="host.CPU"></el-input></el-form-item>
        <el-form-item label="CPU brand" prop="CPUbrand"   v-if="CPUbrand">

        <el-input v-model="host.CPUbrand"></el-input></el-form-item>
        <el-form-item label="RAM" prop="RAM"   v-if="RAM">

        <el-input v-model="host.RAM"></el-input></el-form-item>
        <el-form-item label="RAM brand" prop="RAMbrand"   v-if="RAMbrand">

        <el-input v-model="host.RAMbrand"></el-input></el-form-item>
        <el-form-item label="MAC address" prop="MACaddress"   v-if="MACaddress">

        <el-input v-model="host.MACaddress"></el-input></el-form-item>
        <el-form-item label="service" prop="service"   v-for="(service,index) in servicesnum">

        <el-input v-model="services[index]"></el-input></el-form-item>
        <el-form-item label="username" prop="username"   v-for="(username,index) in usernamesnum">

        <el-input v-model="usernames[index]"></el-input></el-form-item>
        <el-form-item label="owner" prop="owner"   v-for="(owner,index) in ownersnum">

        <el-input v-model="owners[index]"></el-input></el-form-item>
        <el-form-item label="location" prop="location"   v-if="location">

        <el-input v-model="host.location"></el-input></el-form-item>
        <el-form-item label="software" prop="software"   v-for="(software,index) in softwaresnum">

        <el-input v-model="softwares[index]"></el-input></el-form-item>
        <el-form-item label="H.D.D" prop="HDD"   v-if="HDD">

        <el-input v-model="host.HDD"></el-input></el-form-item>
        <el-form-item label="H.D.D brand" prop="HDDbrand"   v-if="HDDbrand">

        <el-input v-model="host.HDDbrand"></el-input></el-form-item>

        <el-button type="primary" @click="submit">Submit</el-button>
      </el-form>
      </el-col>
      <el-col :span="8">
        <el-row>
        <el-button round  @click="assetValue=true">asset value</el-button>
        <el-button round  @click="icon=true">icon</el-button>
        <el-button round  @click="FQND=true">FQND</el-button>
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
        <el-button round  @click="servicesnum++">services({{servicesnum}})</el-button>
        </el-row>
        <br>
        <el-row>
          <el-button round  @click="usernamesnum++">usernames({{usernamesnum}})</el-button>
          <el-button round  @click="ownersnum++">owners({{ownersnum}})</el-button>
          <el-button round  @click="location=true">location</el-button>
          </el-row>
          <br>

          <el-row>
          <el-button round  @click="softwaresnum++">softwares({{softwaresnum}})</el-button>
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
    FQND:false,
    OS:false,
    OSversion:false,
    CPU:false,
    CPUbrand:false,
    RAM:false,
    RAMbrand:false,
    MACaddress:false,
    servicesnum:0,
    usernamesnum:0,
    ownersnum:0,
    location:false,
    softwaresnum:0,
    HDD:false,
    HDDbrand:false,
    host: {
      hostname: '',
      IP: '',
      collector: '',
      assetValue: '',
      icon: '',
      FQND: '',
      OS: '',
      OSversion: '',
      CPU: '',
      CPUbrand: '',
      RAM: '',
      RAMbrand: '',
      MACaddress: '',
      location: '',
      HDD: '',
      HDDbrand: ''
    },
      services:[],
      softwares:[],
      owners:[],
      usernames:[],

    rules: {
      name: [
        { required: false, trigger: 'blur' },
      ],
    },}},
    methods: {
      submit() {
        //
        // console.log(this.host);
        // console.log(this.services);
        // console.log(this.softwares);
        // console.log(this.owners);
        // console.log(this.usernames);
        let host= this.host;
        host.services= this.services;
        host.softwares= this.softwares;
        host.usernames= this.usernames;
        host.owners= this.owners;
            this.$http.post('/dashboard',host)
            .then(response=>{
              console.log(response);
            }, error =>{
              console.log(error);
            });

      },
      },

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
