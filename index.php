<?php
// 导入工具
require_once "./fn.php";

//根据 key查询出网页的logo 与 菜单
// site_logo  nav_menus
// 先准备sql语句，key和value是sql语句的关键字，用反引号包起来
$sql_log = "SELECT `value` FROM options WHERE `key`='site_logo'";
$sql_menus = "SELECT `value` FROM options WHERE `key`='nav_menus'";

//查询数据
$logo = select_single( $sql_log );
$nav_menus = select_single( $sql_menus );
// 测试代码
// var_dump($logo);
// var_dump($nav_menus);//josn 格式的字符串
// exit;

// 把数组变成json用的是json_encode()
// 把json变成数组用的是json_decode()
$nav_menus_obj = json_decode( $nav_menus );
// var_dump($nav_menus_obj[0] );
// var_dump($nav_menus_obj[0] -> text );
// exit;


// 用ajax方式获得主页的轮播图 即需要一个后台的php文件
//  当前文件（.php）中的js代码应该是返回到浏览器以后再执行的
?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.html">


      <!-- 网站logo start -->
      <img src="<?php echo $logo;?>" alt="">
      <!-- 网站logo end -->
      
      </a></h1>
      <ul class="nav">


        <!-- 导航菜单 start -->
        <?php foreach( $nav_menus_obj as $obj ) {?>
        <li><a href="<?php echo $obj->link;?>" title="<?php echo $obj->title;?>"><i class="<?php echo $obj->icon?>"></i><?php echo $obj->text?></a></li>
        <?php } ?>
        <!-- 导航菜单 end -->


      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <li>
            <a href="javascript:;">
              <p class="title">废灯泡的14种玩法 妹子见了都会心动</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="uploads/widget_1.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">可爱卡通造型 iPhone 6防水手机套</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="uploads/widget_2.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">变废为宝！将手机旧电池变为充电宝的Better</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="uploads/widget_3.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">老外偷拍桂林芦笛岩洞 美如“地下彩虹”</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="uploads/widget_4.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">doge神烦狗打底南瓜裤 就是如此魔性</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="uploads/widget_5.jpg" alt="">
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">



      <div class="swipe">
       <!-- 图片轮播 -->
      </div>



      
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>
          <li class="large">
            <a href="javascript:;">
              <img src="uploads/hots_1.jpg" alt="">
              <span>XIU主题演示</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_2.jpg" alt="">
              <span>星球大战：原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>
          <li>
            <i>1</i>
            <a href="javascript:;">你敢骑吗？全球第一辆全功能3D打印摩托车亮相</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>2</i>
            <a href="javascript:;">又现酒窝夹笔盖新技能 城里人是不让人活了！</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span class="">阅读 (18206)</span>
          </li>
          <li>
            <i>3</i>
            <a href="javascript:;">实在太邪恶！照亮妹纸绝对领域与私处</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>4</i>
            <a href="javascript:;">没有任何防护措施的摄影师在水下拍到了这些画面</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>5</i>
            <a href="javascript:;">废灯泡的14种玩法 妹子见了都会心动</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_2.jpg" alt="">
              <span>星球大战:原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>






      <!-- 文章列表 start -->
      <div class="panel new" id="articleid">
        
      </div>
      <!-- 文章 end -->






    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
  <script src="/assets/vendors/jquery/jquery.js"></script>
  <script src="/assets/vendors/art-Template/template-web.js"></script>
  <script src="/assets/vendors/swipe/swipe.js"></script>


  <!-- 轮播图模板 -->
  <script type="text/template" id="swipeid">
    <ul class="swipe-wrapper">
    {{ each list }}
      <li>
        <a href="{{ $value.link}}">
          <img src="{{ $value.image}}">
          <span>{{ $value.text }}</span>
        </a>
      </li>
    {{ /each }}
    </ul>
    <p class="cursor">
      {{ each list }}
      <span {{ $index == 0 ? 'class=active' : '' }}></span>
      {{ /each }}
    </p>
    <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
    <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
  </script>
  <!-- 文章模板 -->
  <script type="text/template" id="articletpl">
    <h3>最新发布</h3>

        {{ each list v}}
        <div class="entry">
          <div class="head">
            <span class="sort">{{ v.name }}</span>
            <a href="javascript:;">{{ v.title }}</a>
          </div>
          <div class="main">
            <p class="info"> {{ v.nickname }} 发表于 {{ v.created }}</p>
            <p class="brief">{{ v.content }}</p>
            <p class="extra">
              <span class="reading">阅读({{ v.views || 0 }})</span>
              <span class="comment">评论({{ v.count || 0 }})</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞({{ v.likes || 0 }})</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            {{ if v.feature  }}
            <a href="javascript:;" class="thumb">
              <img src="{{ v.feature  }}" alt="">
            </a>
            {{ /if }}
          </div>
        </div>
        {{ /each }}
  
  </script>

  <script>
    // 初始化我们的代码 封装起来为的是模板加载完在ajax内调用
    function swipe_init() {
      //
      var swiper = Swipe(document.querySelector('.swipe'), {
        auto: 3000,
        transitionEnd: function (index) {
          // index++;

          $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
        }
      });

      // 上/下一张
      $('.swipe .arrow').on('click', function () {
        var _this = $(this);

        if(_this.is('.prev')) {
          swiper.prev();
        } else if(_this.is('.next')) {
          swiper.next();
        }
      });
    }

    // 调用ajax发送请求 
    $.get("./index.swipe.php",function(json){
        $(".swipe").html(template( "swipeid", { list: json } ));
        // 调用轮播图代码
        swipe_init();
      }
    );

    // 调用ajax 发送请求获取文章信息
    $.ajax({
      url: './index.article.php',
      success: function (json) {
        $("#articleid").html( template( "articletpl", {list: json.result } ) );
      }
    });
  </script>
</body>
</html>
