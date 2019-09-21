
<script>

    export default {
      name:'test',
      props:{
        test:''
      },
      // <el-button size="mini">OK</el-button>
      render:function(createElement){

        return createElement('el-button',{
          props:{
            size:"mini"
          }
        },[this.test]);
      }
    }
</script>
