<?php
// 引入config.php文件
require_once "./config.php";

// 封装函数
// 需要一个读取单个数据的函数
function select_single( $sql ) {
  // 连接数据库
  $conn = mysqli_connect( DB_IP, DB_USER, DB_PWD, DB_NAME );
  // 查询语句拿出来的是reader对象，最后一定要free
  $reader = mysqli_query( $conn, $sql );
  // fetch用row来拿，因为它本身只有一个数据，没有必要记住它键的名字
  $item = mysqli_fetch_row( $reader ); //得到的是一个长度为1的数组
  // 释放mysqli
  mysqli_free_result( $reader );
  // 
  mysqli_close( $conn );
  // 返回数据
  return $item[0];
}

?>