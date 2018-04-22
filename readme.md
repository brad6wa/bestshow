文档地址 url(code.zce.me/baixiu-docs/)
-查看设计数据库表名键名以及之间联系
-sql文件导入数据库
-项目思路： 
  1> 查看分析页面机构
  2> 熟悉数据库结构( 表, 字段, 意义 )
  3> 考虑页面那个地方嵌入什么数据
  4> 封装数据操作函数( 写代码 )
  5> 拼接 sql 查询数据, 将数据嵌入到页面中
-考虑封装好的文件放置位置(最外层-根部)fn.php
-页面编写可选方案有三种
  1> 纯PHP的代码来编写
  2> 纯ajax的方式来编写
  3> 一部分用ajax，一部分用PHP的代码方式来编写
-写模板引擎思路
  1> 抽取模板
  2> 挖坑
  3> 使用 jq 发送 请求
  4> php 读取数据
  5> 渲染加到 dom 上
-前端后台页面

  登录页面思路
  1 引入我们的库
  2 判断是不是post请求
  3 验证用户输入是否完整
  4 验证用户名是否存在
  5 验证密码是否正确
  6 都正确了，打开session 存储当前用户的登录信息 id, 发送 PHPSESSID, 跳转到index.php页面


  主页面思路
  1 验证有没有带 PHPSESSID 的 cookie 数据, 如果没有直接回到 登录页
  2 在有数据后, 开启 session, 判断用户信息是否存在, 如果不存在, 调回到登录

  退出页面思路
  index.php页面修改跳转路径（绝对路径）
  删cookie清session，cookie是PHP通过session_start()自动加的，不可能删掉，cookie是会话级别的关闭浏览器自动清除。
  所以只需要清除session就可以，两种做法一种是
  1> unset() cookie对应的key删掉就可以了(常用)
  2> 销毁 session  session_destroy();
  清除之前 session_start()一下 清除后跳转到登录页面 header("Location:/admin/login.php");

  后台主页
  查询当前用户的所有信息，用sql语句查询每一条count
  <img class="avatar" src="<?php echo empty($user_info["avator"]) ? '/assets/img/default.png' : $user_info["avator"] ?>"> 


  注意点：
    1.数据库里面网站logo是一个字段，必须使用数据库查询才能拿到，从实际生活推广上来看，使用php获取logo，技术上ajax也可以实现。
    2.数据库里菜单栏的数据和滚动图片的数据是json数据，php处理json通过遍历显示到页面比ajax复杂。
    3.导入工具 require_once, require, includ_once, includ,这几个方法的区别
    4.sql语句中key和value是sql语句的关键字，用反引号包起来
    5.注意数据库资源的路径 网站访问的是根目录
    6.对象不能像数值一样访问，使用箭头的方式 ->key
    7.轮播图js代码控制图片滚动的，图片是通过ajax请求，再通过模板渲染，加载到页面上，所以要等模板加载完后再执行轮播图js代码。
    8.在用artTemplate模板引擎写三目运算符的时候，我们不用给类加引号，模板引擎已经做了处理。（轮播图小指针）
    9.网站用相对路径（index.php/a/b）可能会出问题,随着URL地址的变化，导致我们的资源没有办法定位，所以html资源用绝对路径。/代表网站根目录，项目直接放在服务器根目录下就直接能访问到网站。php当用最好用相对路径，php的绝对路径是指PHP的安装目录，不是网站根目录。
    10.ajax选项success里面jquery会自动识别返回来的数据，并转化。
    11.在我们写login.php引入库时候，路径不好配置。引入fn.php 相当于在本地找config.php报错。
      1-第一种解决方案
       在当前目录再写一个fn.php里面引入外层的config.php配置文件，login.php只引入当前的fn.php就可以了
      2-第二种解决方案
       在fn.php文件里面不引人config.php文件。然后用到那个引入那个
      3-第三种解决方案
       fn.php和config.php在当前目录再写一遍
    12.php代码可以折行，代码都是被压缩的开发可以空行
    13.验证当前用户存不存在，有数据库时候，两种思路
     1- SELECT * FROM user WHERE email='用户输入的email', 取不到数据表示这个用户不存在，取到这个数据就把密码取出来去验证密码。
     2- 只需要判断用户名和密码是否匹配，不关系用户名和密码是否正确，WHERE 条件可以写成 WHERE email='用户输入的email $_POST["email"]' AND password='用户输入的密码$_POST["password"]'，把验证的行为直接交给数据库处理，存在取出id.
    14.主页面验证用户状态，当用户cookie里面有值，开启session_start();还要验证用户存的id是否为空
    15.index.php页面验证登录状态，判断session里面有没有东西，一种最简单就是直接把session打开，看里边有没有数据，这种方式有点浪费资源，没有提供cookie 打开就会向浏览器传个cookie，网络多一些数据，验证不够严谨，规则上当我们登录后，浏览器cookie里面存一个PHPSESSID的值，存在有可能是登录了或登录超时，不存在肯定没登录。（验证车票）
    16.走的http协议用绝对路径，例如：header("Location: /admin/index.php");文件里引用的路径用相对路径，例如：require "./fn.php"，和网站跳转有关的都用绝对路径
    17.php不支持逻辑或
    18.sql 语句关键字用反向字符串``, 查询的是数值类型不用字符串包裹，是字符串用单双引号包裹""'';