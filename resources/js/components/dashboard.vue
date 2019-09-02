<template>
  <div >
    <el-table
     :data='data()'
      height="250"
      stripe
      style="width: 100%">
      <el-table-column
        prop="hostname"
        label="Host name"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="IP"
        label="IP address"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="collector"
        label="collector"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="assetValue"
        label="asset Value"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="icon"
        label="icon">
      </el-table-column>
      <el-table-column
        prop="FQDN"
        label="FQDN"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="OS"
        label="OS"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="OSversion"
        label="OS version"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="CPU"
        label="CPU"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="CPUbrand"
        label="CPU brand"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="RAM"
        label="RAM"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="RAMbrand"
        label="RAM brand"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="MACaddress"
        label="MAC address"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="location"
        label="location"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="HDD"
        label="H.D.D"
        width="110px">
      </el-table-column>
      <el-table-column
        prop="HDDbrand"
        label="H.D.D brand"
        width="110px">
      </el-table-column>



    </el-table>
  </div>

</template>

<script>
  export default {
    data() {
      return {
      }
    },
    methods:{
      data: function(){

          let table={};
          let tableData= [];
          this.$http.get('/dashboard')
          .then(response=>{
            return response;
          })
          .then(data=> {
            table=data.body;
          //  console.log(table);
            for(let i=0; i<table.hosts.length; i++)
            {
              tableData[i]= {hostname: table.hosts[i].hostname,
                            IP: table.hosts[i].ip,
                            collector: table.hosts[i].collector,
                            assetValue: table.hosts[i].hostname,
                            icon: table.hosts[i].icon,
                            FQDN: table.hosts[i].FQDN,
                            OS: table.hosts[i].OS,
                            OSversion: table.hosts[i].OSversion,
                            CPU: table.hosts[i].CPU,
                            CPUbrand: table.hosts[i].CPUbrand,
                            RAM: table.hosts[i].RAM,
                            RAMbrand: table.hosts[i].RAMbrand,
                            MACaddress: table.hosts[i].MACaddress,
                            location: table.hosts[i].location,
                            HDD: table.hosts[i].HDD,
                            HDDbrand: table.hosts[i].HDDbrand
              };
            }
          });
          console.log(tableData);
          return tableData;
      }
    },
    mounted() {
        //this.resource= this.$resource('/dashboard');

      },


  }
</script>
