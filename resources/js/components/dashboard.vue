<template>
  <div >
    <el-table @row-click="handleCurrentChange" highlight-current-row
     :data='data'
     class="tb-edit"
      height="600"
      stripe
      style="width: 100%">
      <el-table-column v-for="field in fields"

        :prop="field.prop"
        :label="field.label"
        width="110px">
        <template scope="scope">
              <el-input size="small" v-model="scope.row[field.prop]" @change="handleEdit(scope.$index, scope.row)"></el-input>
              <span>{{scope.row[field.prop]}}</span>
        </template>
      </el-table-column>

   <el-table-column
      label="Operations"
      width="250px"
      fixed="right">
      <template slot-scope="scope">
        <el-button
        size="mini"
        type="submit"
        @click="handlechange(scope.$index, scope.row)">submit changes</el-button>
          <el-button
          size="mini"
          type="danger"
          @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
      </template>
    </el-table-column>

    </el-table>
  </div>

</template>

<script>
  export default {

    data() {
      return {
        data:[],
        fields:[
          {
            prop:"hostname",
            label:"Host name",
          },
          {
            prop:"IP",
            label:"IP address",
          },
          {
            prop:"collector",
            label:"collector",
          },
          {
            prop:"assetValue",
            label:"asset Value",
          },
          {
            prop:"icon",
            label:"icon",
          },
          {
            prop:"FQND",
            label:"FQND",
          },
          {
            prop:"OS",
            label:"OS",
          },
          {
            prop:"OSversion",
            label:"OS version",
          },
          {
            prop:"CPU",
            label:"CPU",
          },
          {
            prop:"CPUbrand",
            label:"CPU brand",
          },
          {
            prop:"RAM",
            label:"RAM",
          },
          {
            prop:"RAMbrand",
            label:"RAM brand",
          },
          {
            prop:"MACaddress",
            label:"MAC address",
          },
          {
            prop:"location",
            label:"location",
          },
          {
            prop:"HDD",
            label:"H.D.D",
          },
          {
            prop:"HDDbrand",
            label:"H.D.D brand",
          },
          {
            prop:"services",
            label:"services",
          },
          {
            prop:"softwares",
            label:"softwares",
          },
          {
            prop:"usernames",
            label:"user names",
          },
          {
            prop:"owners",
            label:"owners",
          },
        ]
      }
    },
    methods: {
          handleCurrentChange(row, event, column) {
                console.log(row, event, column, event.currentTarget)
            },
      handleEdit(index, row) {
        console.log(row.id);

      },
      handlechange(index, row){
            let url= "http://localhost:8000/api/change/";
            url+= row.id;
            let host={};
            host= row;
            host.services= row.services.split(",");
            host.softwares= row.softwares.split(",");
            host.usernames= row.usernames.split(",");
            host.owners= row.owners.split(",");
            console.log(host);
            this.$http.post(url,host)
            .then(response=>{
              console.log(response);
            }, error =>{
              console.log(error);
            });
       location.reload();

      },
      handleDelete(index, row) {

          let url= "http://localhost:8000/api/delete/";
          url+= row.id;
          this.$http.get(url)
          .then(response=>{
            return response;
          })
          .then(data=> {
          });
          location.reload();


      },
      },

    mounted:function() {
                let table={};
                let tableData= [];
                this.$http.get('/api/dashboard')
                .then(data=>{
                  console.log(data);
                  table=data.body;
                  for(let i=0; i<table.length; i++)
                  {
                    tableData.push({
                                  id: table[i].id,
                                  hostname: table[i].hostname,
                                  IP: table[i].ip,
                                  collector: table[i].collector,
                                  assetValue: table[i].assetValue,
                                  icon: table[i].icon,
                                  FQND: table[i].FQND,
                                  OS: table[i].OS,
                                  OSversion: table[i].OSversion,
                                  CPU: table[i].CPU,
                                  CPUbrand: table[i].CPUbrand,
                                  RAM: table[i].RAM,
                                  RAMbrand: table[i].RAMbrand,
                                  MACaddress: table[i].MACaddress,
                                  location: table[i].location,
                                  HDD: table[i].HDD,
                                  HDDbrand: table[i].HDDbrand,
                                  services:[],
                                  softwares:[],
                                  owners:[],
                                  usernames:[]
                                });
                      let arr=[];
                      for(let j=0; j<table[i].services.length; j++)
                      {
                        arr[j]=table[i].services[j].service;
                      }
                      tableData[i].services=arr.toString();
                      arr=[];
                      for(let j=0; j<table[i].softwares.length; j++)
                      {
                        arr[j]=table[i].softwares[j].software;
                      }
                      tableData[i].softwares=arr.toString();
                      arr=[];
                      for(let j=0; j<table[i].owners.length; j++)
                      {
                        arr[j]=table[i].owners[j].owner;
                      }
                      tableData[i].owners=arr.toString();
                      arr=[];
                      for(let j=0; j<table[i].usernames.length; j++)
                      {
                        arr[j]=table[i].usernames[j].username;
                      }
                      tableData[i].usernames=arr.toString();
                      arr=[];
                  }
                })
                .then(data=> {
                });
                this.data= tableData;
      },
  }
</script>
<style >
.tb-edit .el-input {
    display: none;
    height: 115px;
}
.tb-edit .current-row .el-input {
    display: block;
    height: 115px;
    padding-top: 41px;
    padding-bottom: 41;
}
.tb-edit .current-row .el-input+span {
    display: none;
    height: 115px;
}

</style>
