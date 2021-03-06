<?php
// 引入库
require_once "./fn.php";

// 验证登录状态

if( empty( $_COOKIE[ "PHPSESSID" ] ) ) {
  header( "Location: ./login.php?1" );
  exit;
} 
// 开启session 
session_start();
if( empty( $_SESSION[ "current_user_login_id" ] ) ) {
  header( "Location: ./login.php?2" );
  exit;
}


$current_user_login_id = $_SESSION[ "current_user_login_id" ];

// 继续查询用户其他信息等操作
// 查询用户的所有数据 $current_user_login_id是数值类型不用加引号
$user_info = select_row("SELECT * FROM users  WHERE id=$current_user_login_id ");
// 文章的搜索查询
$post_count = select_single("SELECT COUNT(*) FROM posts");
// 草稿查询
$post_count_drafted = select_single("SELECT COUNT(*) FROM posts WHERE `status`='drafted'");
// 分类查询
$cate_count = select_single("SELECT COUNT(*) FROM categories");
// 评论查询
$comment_count = select_single("SELECT COUNT(*) FROM comments");
// 评审查询
$comment_count_held = select_single("SELECT COUNT(*) FROM comments WHERE `status`='held'");


?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <script src="../assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.html"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="/admin/logout.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
        <p><a class="btn btn-primary btn-lg" href="post-add.html" role="button">写文章</a></p>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">站点内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo $post_count;?></strong>篇文章（<strong><?php echo $post_count_drafted;?></strong>篇草稿）</li>
              <li class="list-group-item"><strong><?php echo $cate_count;?></strong>个分类</li>
              <li class="list-group-item"><strong><?php echo $comment_count;?></strong>条评论（<strong><?php echo $comment_count_held;?></strong>条待审核）</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>

  <div class="aside">
    <div class="profile">



      <!-- php不支持逻辑或 -->
      <img class="avatar" src="<?php echo isset($user_info["avator"]) 
                            ? $user_info["avator"]
                            : '/assets/img/default.png'?>">
          
      
          


      <h3 class="name"><?php echo $user_info["nickname"];?></h3>
    </div>
    <ul class="nav">
      <li class="active">
        <a href="index.html"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li>
        <a href="#menu-posts" class="collapsed" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse">
          <li><a href="posts.html">所有文章</a></li>
          <li><a href="post-add.html">写文章</a></li>
          <li><a href="categories.html">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.html"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.html"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.html">导航菜单</a></li>
          <li><a href="slides.html">图片轮播</a></li>
          <li><a href="settings.html">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <script src="../assets/vendors/jquery/jquery.js"></script>
  <script src="../assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
