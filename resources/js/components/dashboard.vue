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

   <el-table-column v-if="deleteupdate"
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
        deleteupdate:false,
        split:[
          ['services','service'],
          ['softwares','software'],
          ['usernames','username'],
          ['owners','owner'],
        ],
        data:[],
        fields:[
          {
            prop:"hostname",
            label:"Host name",
          },
          {
            prop:"ip",
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
            let split= this.split;
            for (var i = 0; i < split.length; i++) {
              let prop=split[i][0];
              let rowprop=row[prop];
              console.log(rowprop.split(","));
              host[prop]=rowprop.split(",");
            }
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

        let level=localStorage.getItem('level');
        if(level==1){
          this.deleteupdate=true;
        }
                let table=[];
                let tableData= [];
                this.$http.get('/api/dashboard')
                .then(data=>{
                  console.log(data);
                  table=data.body;
                  for (var i = 0; i < table.length; i++) {
                    delete table[i].created_at;
                    delete table[i].updated_at;
                    let split=this.split;
                    for (var k = 0; k < split.length; k++) {
                      let prop=split[k][0];
                      let p=split[k][1];
                      let arr=[];
                      let tableprop=table[i][prop];
                      for (var j = 0; j < tableprop.length; j++) {
                        let innertableprop=tableprop[j][p];
                        arr[j]= innertableprop;
                      }
                      tableprop= arr.toString();
                      table[i][prop]=tableprop;
                    }
                  }
                  for(let i=0; i<table.length; i++)
                  {
                    let arr={};
                    for (var j = 0; j < this.fields.length; j++) {
                      let prop=this.fields[j].prop;
                      arr[prop]=table[i][prop];
                    }
                    arr.id=table[i].id;
                    tableData.push(arr);
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
