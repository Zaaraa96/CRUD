<template>
  <div >
    <el-table
     :data='data'
      height="1250"
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
        prop="FQND"
        label="FQND"
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
      <el-table-column
      prop="services"
      label="services"
      width="110px">
    </el-table-column>

    <el-table-column
      prop="softwares"
      label="softwares"
      width="110px">
    </el-table-column>
    <el-table-column
     prop="owners"
     label="owners"
     width="110px">
   </el-table-column>
   <el-table-column
     prop="usernames"
     label="user names"
     width="110px">
   </el-table-column>

    </el-table>
  </div>

</template>

<script>
  export default {
    data() {
      return {
        data:[],
      }
    },
    mounted() {
        //this.resource= this.$resource('/dashboard');

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
                    tableData.push({
                                  id: table.hosts[i].id,
                                  hostname: table.hosts[i].hostname,
                                  IP: table.hosts[i].ip,
                                  collector: table.hosts[i].collector,
                                  assetValue: table.hosts[i].hostname,
                                  icon: table.hosts[i].icon,
                                  FQND: table.hosts[i].FQND,
                                  OS: table.hosts[i].OS,
                                  OSversion: table.hosts[i].OSversion,
                                  CPU: table.hosts[i].CPU,
                                  CPUbrand: table.hosts[i].CPUbrand,
                                  RAM: table.hosts[i].RAM,
                                  RAMbrand: table.hosts[i].RAMbrand,
                                  MACaddress: table.hosts[i].MACaddress,
                                  location: table.hosts[i].location,
                                  HDD: table.hosts[i].HDD,
                                  HDDbrand: table.hosts[i].HDDbrand,
                                  services:[],
                                  softwares:[],
                                  owners:[],
                                  usernames:[]
                                });
                  }
                  for(let i=0; i<tableData.length; i++)
                  {
                    for (let j=0; j<table.service.length; j++)
                      {
                        if(tableData[i].id==table.service[j].hostID)
                          {
                            tableData[i].services.push(table.service[j].service);
                            tableData[i].services.push(',');
                          }
                      }
                    for (let j=0; j<table.software.length; j++)
                        {
                          if(tableData[i].id==table.software[j].hostID)
                            {
                              tableData[i].softwares.push(table.software[j].software);
                              tableData[i].softwares.push(',');
                            }
                        }
                    for (let j=0; j<table.owner.length; j++)
                          {
                            if(tableData[i].id==table.owner[j].hostID)
                              {
                                tableData[i].owners.push(table.owner[j].owner);
                                tableData[i].owners.push(',');
                              }
                          }
                    for (let j=0; j<table.username.length; j++)
                            {
                              if(tableData[i].id==table.username[j].hostID)
                                {
                                  tableData[i].usernames.push(table.username[j].username);
                                  tableData[i].usernames.push(',');
                                }
                            }
                  }
                  for(let i=0; i<tableData.length; i++)
                  {
                    tableData[i].services.pop();
                    tableData[i].softwares.pop();
                    tableData[i].owners.pop();
                    tableData[i].usernames.pop();
                  }

                  console.log(tableData);
                });
                this.data= tableData;
      },


  }
</script>
