<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <!-- Fonts -->

        <!-- Styles -->
        <style>
        .el-button{
          margin: 20px;
        }
        </style>
    </head>
    <body>

      @can('updatedelete')
        <h5>can update and delete</h5>
      @endcan
      @cannot('updatedelete')
        <h5>cannot update and delete</h5>
      @endcannot

      <div id="app">
  </div>

  <script src="/js/app.js"></script>
    </body>
</html>
