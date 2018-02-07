<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title ;?></title>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/css/flexslider.css">
    <link rel="stylesheet" href="/Public/css/jquery.fancybox.css">
    <link rel="stylesheet" href="/Public/css/main.css">
    <link rel="stylesheet" href="/Public/css/responsive.css">
    <link rel="stylesheet" href="/Public/css/animate.min.css">
    <link rel="stylesheet" href="/Public/css/font-icon.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
</head>
<style>
    .personals_data{position: absolute;right: 130px;top: 60px;}
</style>
<body>
<section class="banner" role="banner">
    <header id="header">
        <div class="header-content clearfix"> <a class="logo" href="index.html"><img src="/Public/images/logo.png" alt=""></a>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <li><?php echo date("Y-m-d",time()) ;?></li>
                    <li><a href="mainlto:hello@phdl.co"><?php echo ($_SESSION['bsme']['nick_name']); ?>（我们的记忆）</a></li>
                </ul>
            </nav>
            <a href="#" class="nav-toggle">Menu<span></span></a>
            <!--<div class="personals_data">-->
                <!--<ul>-->
                    <!--<li><a href="/index.php/Home/User/myclass" title="我的课程" rel="nofollow">我的课程</a></li>-->
                    <!--<li><a href="/index.php/Home/User/myclass?grzl=grzl"  title="个人资料" rel="nofollow">个人资料</a></li>-->
                    <!--<li><a href="/index.php/Home/User/myclass?yhq=yhq"  title="我的优惠券" rel="nofollow">我的优惠券</a></li>-->
                    <!--<li><a href="/index.php/Home/User/myclass?dingdan=dingdan"  title="我的订单" rel="nofollow">我的订单</a></li>-->
                    <!--<li><a href="/index.php/Home/User/myclass?dizhi=dizhi"  title="收货地址" rel="nofollow">收货地址</a></li>-->
                    <!--<li><a href="/index.php/Home/User/logout" style="text-align: left;padding:0 0 0 46px;" class="last_btn"  title="退出" rel="nofollow">退出</a></li>-->
                <!--</ul>-->
            <!--</div>-->

        </div>
    </header>
</section>
<!-- header top section -->

<!-- header top section -->

<!-- header top section --> 
<!-- header content section -->
<section id="hero" class="section ">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-6 hero">
        <div class="hero-content">
          <h1>你的快乐 & 我的开心</h1>
        </div>
        <!-- hero --> 
      </div>
      <div class="col-md-5 col-sm-6 hero">
        <div class="hero-content">
          <p>FREE Bootstrap v3.3.5 frame work base minimal portfolio template for presonal use and creative agency.</p>
        </div>
        <!-- hero --> 
      </div>
    </div>
  </div>
</section>

<!--<form action="/index.php/Home/Index/upload" enctype="multipart/form-data" method="post" >-->
  <!--<input type="text" name="name" />-->
  <!--<input type="file" name="photo" />-->
  <!--<input type="submit" value="提交" >-->
<!--</form>-->
<!-- header content section --> 
<!-- portfolio grid section -->
<section id="portfolio">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <hr class="section">
      </div>
    </div>
    <div class="row">
      <?php foreach($data as $key => $val){ ?>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3><?php echo $val['title'] ?></h3>
            <h4><?php echo $val['content'] ?></h4>
          </div>
        </div>
        <img src="<?php echo $val['imgurl'] ?>" class="img-responsive" alt=""> </a> </div>
      <?php } ?>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3>czarna kawka</h3>
            <h4>Branding</h4>
          </div>
        </div>
        <img src="/Public/images/portfolio/work-2.jpg" class="img-responsive" alt=""> </a> </div>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3>czarna kawka</h3>
            <h4>Branding</h4>
          </div>
        </div>
        <img src="/Public/images/portfolio/work-3.jpg" class="img-responsive" alt=""> </a> </div>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3>czarna kawka</h3>
            <h4>Branding</h4>
          </div>
        </div>
        <img src="/Public/images/portfolio/work-4.jpg" class="img-responsive" alt=""> </a> </div>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3>czarna kawka</h3>
            <h4>Branding</h4>
          </div>
        </div>
        <img src="/Public/images/portfolio/work-5.jpg" class="img-responsive" alt=""> </a> </div>
      <div class="col-sm-6 portfolio-item"> <a href="work-details.html" class="portfolio-link">
        <div class="caption">
          <div class="caption-content">
            <h3>czarna kawka</h3>
            <h4>Branding</h4>
          </div>
        </div>
        <img src="/Public/images/portfolio/work-6.jpg" class="img-responsive" alt=""> </a> </div>
    </div>
  </div>
</section>
<!-- portfolio grid section --> 
<!-- service section -->
<section id="service" class="service section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-6">
        <h4>We're expert to create beautiful design & smart technology</h4>
        <p>Nullam at enim mauris. Donec et nunc ipsum. Suspendi tempus fringilla ipsu Cras metus euismod velit gravida at nunc ipsum.</p>
      </div>
      <div class="col-md-7 col-sm-6">
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-browser"></span>
          <div class="service-content">
            <h5>Web & Mobile</h5>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-trophy"></span>
          <div class="service-content">
            <h5>Branding</h5>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 service text-center"> <span class="icon icon-megaphone"></span>
          <div class="service-content">
            <h5>Digital Marketing</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- service section --> 
<!-- footer section -->
<footer class="footer">
  <div class="container">
    <div class="col-md-6 left">
      <h4>Let's work together</h4>
      <p> Call: 612.269.8419 OR Email : <a href="mailto:hello@agency.com"> hello@agency.com </a></p>
    </div>
    <div class="col-md-6 right">
      <p>© 2015 All rights reserved. All Rights Reserved<br>
        More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
    </div>
  </div>
</footer>


<!-- footer section -->

<!-- JS FILES -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="/Public/js/jquery.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
<script src="/Public/js/jquery.fancybox.pack.js"></script>
<!--<script src="/Public/js/retina.min.js"></script>-->
<script src="/Public/js/modernizr.js"></script>
<script src="/Public/js/main.js"></script>
</body>
</html>