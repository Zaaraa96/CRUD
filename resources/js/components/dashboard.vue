<template>
  <div >
    <el-table @row-click="handleCurrentChange" highlight-current-row
     :data='data'
     class="tb-edit"
      height="1250"
      stripe
      style="width: 100%">
      <el-table-column
        prop="hostname"
        label="Host name"
        width="110px">
        <template scope="scope">
              <el-input size="small" v-model="scope.row.hostname" @change="handleEdit(scope.$index, scope.row)"></el-input>
              <span>{{scope.row.hostname}}</span>
        </template>
      </el-table-column>
      <el-table-column
        prop="IP"
        label="IP address"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.IP" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.IP}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="collector"
        label="collector"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.collector" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.collector}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="assetValue"
        label="asset Value"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.assetValue" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.assetValue}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="icon"
        label="icon" width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.icon" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.icon}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="FQND"
        label="FQND"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.FQND" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.FQND}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="OS"
        label="OS"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.OS" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.OS}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="OSversion"
        label="OS version"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.OSversion" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.OSversion}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="CPU"
        label="CPU"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.CPU" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.CPU}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="CPUbrand"
        label="CPU brand"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.CPUbrand" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.CPUbrand}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="RAM"
        label="RAM"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.RAM" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.RAM}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="RAMbrand"
        label="RAM brand"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.RAMbrand" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.RAMbrand}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="MACaddress"
        label="MAC address"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.MACaddress" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.MACaddress}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="location"
        label="location"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.location" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.location}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="HDD"
        label="H.D.D"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.HDD" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.HDD}}</span>
</template>
      </el-table-column>
      <el-table-column
        prop="HDDbrand"
        label="H.D.D brand"
        width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.HDDbrand" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.HDDbrand}}</span>
</template>
      </el-table-column>
      <el-table-column
      prop="services"
      label="services"
      width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.services" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.services}}</span>
</template>
    </el-table-column>

    <el-table-column
      prop="softwares"
      label="softwares"
      width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.softwares" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.softwares}}</span>
</template>
    </el-table-column>
    <el-table-column
     prop="owners"
     label="owners"
     width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.owners" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.owners}}</span>
</template>
   </el-table-column>
   <el-table-column
     prop="usernames"
     label="user names"
     width="110px"> <template scope="scope">
      <el-input size="small" v-model="scope.row.usernames" @change="handleEdit(scope.$index, scope.row)"></el-input>
      <span>{{scope.row.usernames}}</span>
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
        let url= "http://localhost:8000/change/";
        url+= row.id;
        let host={};
        host.hostname= row.hostname;
        host.IP= row.IP;
        host.collector=row.collector;
        host.assetValue=row.assetValue;
        host.icon=row.icon;
        host.FQND=row.FQND;
        host.OS=row.OS;
        host.OSversion=row.OSversion;
        host.CPU=row.CPU;
        host.CPUbrand=row.CPUbrand;
        host.RAM=row.RAM;
        host.RAMbrand=row.RAMbrand;
        host.MACaddress=row.MACaddress;
        host.location=row.location;
        host.HDD=row.HDD;
        host.HDDbrand=row.HDDbrand;
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
                          assetValue: table.hosts[i].assetValue,
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

          let arr=[];
          for(let i=0; i<tableData.length; i++)
          {
            for (let j=0; j<table.service.length; j++)
              {
                if(tableData[i].id==table.service[j].hostID)
                  {
                    arr.push(table.service[j].service);
                    //tableData[i].services.push(',');
                  }
              }
              tableData[i].services= arr.toString();
              arr=[];
            for (let j=0; j<table.software.length; j++)
                {
                  if(tableData[i].id==table.software[j].hostID)
                    {
                      arr.push(table.software[j].software);
                      //tableData[i].softwares.push(',');
                    }
                }
                tableData[i].softwares= arr.toString();
                arr=[];
            for (let j=0; j<table.owner.length; j++)
                  {
                    if(tableData[i].id==table.owner[j].hostID)
                      {
                        arr.push(table.owner[j].owner);
                        //tableData[i].owners.push(',');
                      }
                  }
                  tableData[i].owners= arr.toString();
                  arr=[];
            for (let j=0; j<table.username.length; j++)
                    {
                      if(tableData[i].id==table.username[j].hostID)
                        {
                          arr.push(table.username[j].username);
                          //tableData[i].usernames.push(',');
                        }
                    }
                    tableData[i].usernames= arr.toString();
                    arr=[];
          }
          // for(let i=0; i<tableData.length; i++)
          // {
          //   tableData[i].services.pop();
          //   tableData[i].softwares.pop();
          //   tableData[i].owners.pop();
          //   tableData[i].usernames.pop();
          // }

        });
        this.data= tableData;

      },
      handleDelete(index, row) {
        let url= "http://localhost:8000/delete/";
        url+= row.id;
        this.$http.get(url)
        .then(response=>{
          return response;
        })
        .then(data=> {
        });
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
                          assetValue: table.hosts[i].assetValue,
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

          let arr=[];
          for(let i=0; i<tableData.length; i++)
          {
            for (let j=0; j<table.service.length; j++)
              {
                if(tableData[i].id==table.service[j].hostID)
                  {
                    arr.push(table.service[j].service);
                    //tableData[i].services.push(',');
                  }
              }
              tableData[i].services= arr.toString();
              arr=[];
            for (let j=0; j<table.software.length; j++)
                {
                  if(tableData[i].id==table.software[j].hostID)
                    {
                      arr.push(table.software[j].software);
                      //tableData[i].softwares.push(',');
                    }
                }
                tableData[i].softwares= arr.toString();
                arr=[];
            for (let j=0; j<table.owner.length; j++)
                  {
                    if(tableData[i].id==table.owner[j].hostID)
                      {
                        arr.push(table.owner[j].owner);
                        //tableData[i].owners.push(',');
                      }
                  }
                  tableData[i].owners= arr.toString();
                  arr=[];
            for (let j=0; j<table.username.length; j++)
                    {
                      if(tableData[i].id==table.username[j].hostID)
                        {
                          arr.push(table.username[j].username);
                          //tableData[i].usernames.push(',');
                        }
                    }
                    tableData[i].usernames= arr.toString();
                    arr=[];
          }
        //   for(let i=0; i<tableData.length; i++)
        //   {
        //     tableData[i].services.pop();
        //     tableData[i].softwares.pop();
        //     tableData[i].owners.pop();
        //     tableData[i].usernames.pop();
        //   }
        //
        });
        this.data= tableData;
      },
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
                  let arr=[];
                  for(let i=0; i<tableData.length; i++)
                  {
                    for (let j=0; j<table.service.length; j++)
                      {
                        if(tableData[i].id==table.service[j].hostID)
                          {
                            arr.push(table.service[j].service);
                            //tableData[i].services.push(',');
                          }
                      }
                      tableData[i].services= arr.toString();
                      arr=[];
                    for (let j=0; j<table.software.length; j++)
                        {
                          if(tableData[i].id==table.software[j].hostID)
                            {
                              arr.push(table.software[j].software);
                              //tableData[i].softwares.push(',');
                            }
                        }
                        tableData[i].softwares= arr.toString();
                        arr=[];
                    for (let j=0; j<table.owner.length; j++)
                          {
                            if(tableData[i].id==table.owner[j].hostID)
                              {
                                arr.push(table.owner[j].owner);
                                //tableData[i].owners.push(',');
                              }
                          }
                          tableData[i].owners= arr.toString();
                          arr=[];
                    for (let j=0; j<table.username.length; j++)
                            {
                              if(tableData[i].id==table.username[j].hostID)
                                {
                                  arr.push(table.username[j].username);
                                  //tableData[i].usernames.push(',');
                                }
                            }
                            tableData[i].usernames= arr.toString();
                            arr=[];
                  }
                  // for(let i=0; i<tableData.length; i++)
                  // {
                  //   tableData[i].services.pop();
                  //   tableData[i].softwares.pop();
                  //   tableData[i].owners.pop();
                  //   tableData[i].usernames.pop();
                  // }

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
    padding-bottom: 41px;
}
.tb-edit .current-row .el-input+span {
    display: none;
    height: 115px;
}

</style>
