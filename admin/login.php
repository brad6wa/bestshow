<?php

// 1 引入我们的库
// 2 判断是不是post请求
// 3 验证用户输入是否完整
// 4 验证用户名是否存在
// 5 验证密码是否正确
// 6 都正确了，打开session 存储当前用户的登录信息 id, 发送 PHPSESSID, 跳转到index.php页面
require_once "./fn.php";

// 判断他是不是post提交
if( $_SERVER[ "REQUEST_METHOD" ] === "POST" ) {
  // 验证用户名和密码是否完整
  if( empty( $_POST[ "email" ] ) || empty( $_POST[ "password" ] ) ) {
    $message = "请输入完整信息1";
  } else {
    
    // 开始读取数据 进行验证
    $email = $_POST[ "email" ];
    $password = $_POST[ "password" ];

    // 单行数据查询
    $id = select_single( "SELECT id FROM users WHERE email='$email' AND password='$password'" );

    // var_dump( $id );
    // exit;
    if( empty( $id ) ) {
      $message = "用户名或密码不正确，请重新输入！";
    } else {
      // 开启session
      session_start();

      // 存储当前用户id
      $_SESSION[ "current_user_login_id" ] = $id;

      // 跳转主页页面
      // $message = "登录成功";
      header( "Location: ./index.php");
    }

  }
}


?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap" method="POST">
      <img class="avatar" src="../assets/img/default.png">
      <!-- 有错误信息时展示 -->


      <?php if( isset( $message ) ) { ?>
      <div class="alert alert-danger">
        <strong>错误！</strong> <?php echo $message;?>
      </div>
      <?php } ?>


      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>


        <input id="email" 
               type="email" 
               class="form-control" 
               placeholder="邮箱"
               name="email" 
               autofocus>


      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>


        <input  id="password" 
                type="password" 
                class="form-control"
                name="password" 
                placeholder="密码">



      </div>
      <input type="submit" class="btn btn-primary btn-block" value="登 录">
    </form>
  </div>
</body>
</html>
