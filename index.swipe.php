<?php
require_once './fn.php';
// // 告诉我们的服务器拿过来是json 数据
header( "Content-Type: application/json" );
// // 输出数据库轮播图的的数据
echo select_single( "SELECT `value` FROM options WHERE `key`='home_slides'" );

?>