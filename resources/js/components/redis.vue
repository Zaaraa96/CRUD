<template>
<div >

  <el-button :plain="true" >{{user}}</el-button>
  <el-table
   :data='data'
    height="600"
    stripe
    style="width: 20%">
    <el-table-column

      prop="number"
      label="number"
      width="110px">
    </el-table-column>
    <el-table-column

      prop="activity"
      label="activity"
      width="110px">
    </el-table-column>

  </el-table>
</div>

</template>

<script>
export default {
  name: "redis",
  data() {
    return {
      data:[],
      user:'',
    };
  },
  methods: {
    },
    mounted:function() {

                let table=[];
                let user='';
                this.$http.get('/api/redis')
                .then(data=>{
                  user=data.body.user;
                  for (var i = 0; i < data.body.data[0].length; i++) {
                    let arr={};
                    arr.number= data.body.data[0].length-i;
                    arr.activity=data.body.data[0][i];

                    table[i]= arr;
                    arr={};
                  }
                })
                .then(data=> {
                  this.data=table;
                  this.user= user;
                });

      },
  }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
