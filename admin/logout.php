<?php

session_start();

// 第一种清除session
// unset($_SESSION[ "current_user_login_id"]);

// 第二种销毁session
session_destroy();

header( "Location: /admin/login.php" );

