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
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Image Wall with jQuery and CSS3</title>
		<meta charset="UTF-8" />
        <meta name="description" content="Image Wall with jQuery and CSS3" />
        <meta name="keywords" content="jquery, css3, images, wall, thumbnails, slide, animate"/>
		<meta name="author" content="Codrops" />
        <link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css' />
    </head>
    <body>
		<div class="content">
			<header>
				<h1>A silent world</h1>
				<span>Image Wall with jQuery and CSS3</span>
			</header>
			<div class="iw_wrapper">
				<ul class="iw_thumbs" id="iw_thumbs">
					<?php foreach($data as $key => $val){ ?>
						<li><img src="<?php echo $val['imgurl'] ?>" data-img="<?php echo $val['imgurl'] ?>" alt="Thumb1"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>
					<?php } ?>
					<!--<li><img src="images/thumbs/2.jpg" data-img="images/full/2.jpg" alt="Thumb2"/><div><h2>Silence</h2><p>Separated they live in Bookmarksgrove right at the coast of the Semantics.</p></div></li>-->
					<!--<li><img src="images/thumbs/3.jpg" data-img="images/full/3.jpg" alt="Thumb3"/><div><h2>Abstraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/8.jpg" data-img="images/full/8.jpg" alt="Thumb8"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/9.jpg" data-img="images/full/9.jpg" alt="Thumb9"/><div><h2>Greatness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/10.jpg" data-img="images/full/10.jpg" alt="Thumb10"/><div><h2>Abstraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/6.jpg" data-img="images/full/6.jpg" alt="Thumb6"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/7.jpg" data-img="images/full/7.jpg" alt="Thumb7"/><div><h2>Beauty</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/8.jpg" data-img="images/full/8.jpg" alt="Thumb8"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/12.jpg" data-img="images/full/12.jpg" alt="Thumb12"/><div><h2>Greatness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/4.jpg" data-img="images/full/4.jpg" alt="Thumb4"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/5.jpg" data-img="images/full/5.jpg" alt="Thumb5"/><div><h2>Growth</h2><p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p></div></li>-->
					<!--<li><img src="images/thumbs/6.jpg" data-img="images/full/6.jpg" alt="Thumb6"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/7.jpg" data-img="images/full/7.jpg" alt="Thumb7"/><div><h2>Beauty</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/10.jpg" data-img="images/full/10.jpg" alt="Thumb10"/><div><h2>Abstraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/11.jpg" data-img="images/full/11.jpg" alt="Thumb11"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/3.jpg" data-img="images/full/3.jpg" alt="Thumb3"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/13.jpg" data-img="images/full/13.jpg" alt="Thumb13"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/14.jpg" data-img="images/full/14.jpg" alt="Thumb14"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/2.jpg" data-img="images/full/2.jpg" alt="Thumb1"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/4.jpg" data-img="images/full/4.jpg" alt="Thumb2"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/11.jpg" data-img="images/full/11.jpg" alt="Thumb11"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/12.jpg" data-img="images/full/12.jpg" alt="Thumb12"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/13.jpg" data-img="images/full/13.jpg" alt="Thumb13"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/14.jpg" data-img="images/full/14.jpg" alt="Thumb14"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/2.jpg" data-img="images/full/2.jpg" alt="Thumb1"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/4.jpg" data-img="images/full/4.jpg" alt="Thumb2"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/6.jpg" data-img="images/full/6.jpg" alt="Thumb3"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/8.jpg" data-img="images/full/8.jpg" alt="Thumb4"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/12.jpg" data-img="images/full/12.jpg" alt="Thumb1"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/2.jpg" data-img="images/full/2.jpg" alt="Thumb2"/><div><h2>Silence</h2><p>Separated they live in Bookmarksgrove right at the coast of the Semantics.</p></div></li>-->
					<!--<li><img src="images/thumbs/3.jpg" data-img="images/full/3.jpg" alt="Thumb3"/><div><h2>Abstraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/4.jpg" data-img="images/full/4.jpg" alt="Thumb4"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/5.jpg" data-img="images/full/5.jpg" alt="Thumb5"/><div><h2>Growth</h2><p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p></div></li>-->
					<!--<li><img src="images/thumbs/6.jpg" data-img="images/full/6.jpg" alt="Thumb6"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/7.jpg" data-img="images/full/7.jpg" alt="Thumb7"/><div><h2>Beauty</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/8.jpg" data-img="images/full/8.jpg" alt="Thumb8"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/9.jpg" data-img="images/full/9.jpg" alt="Thumb9"/><div><h2>Greatness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/10.jpg" data-img="images/full/10.jpg" alt="Thumb10"/><div><h2>Abstraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/11.jpg" data-img="images/full/11.jpg" alt="Thumb11"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/1.jpg" data-img="images/full/1.jpg" alt="Thumb12"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/13.jpg" data-img="images/full/13.jpg" alt="Thumb13"/><div><h2>Happiness</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/14.jpg" data-img="images/full/14.jpg" alt="Thumb14"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/2.jpg" data-img="images/full/2.jpg" alt="Thumb1"/><div><h2>Virtue</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/4.jpg" data-img="images/full/4.jpg" alt="Thumb2"/><div><h2>Serenity</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
					<!--<li><img src="images/thumbs/6.jpg" data-img="images/full/6.jpg" alt="Thumb3"/><div><h2>Attraction</h2><p>Far far away, behind the word mountains there live the blind texts.</p></div></li>-->
				</ul>
			</div>
			<div id="iw_ribbon" class="iw_ribbon">
				<span class="iw_close"></span>
				<span class="iw_zoom">Click thumb to zoom</span>
			</div>
		</div>
		<div class="footer">
			<a class="left" href="http://www.lanrentuku.com/" target="_blank">代码整理：懒人图库</a>
			<a href="http://tympanus.net/codrops/2011/05/25/image-wall/" target="_blank"><strong>back to the Codrops tutorial</strong></a>
			<a href="http://www.flickr.com/photos/markjsebastian/" target="_blank">Photos by Mark Sebastian</a>
		</div>
		<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
				var $iw_thumbs			= $('#iw_thumbs'),
					$iw_ribbon			= $('#iw_ribbon'),
					$iw_ribbon_close	= $iw_ribbon.children('span.iw_close'),
					$iw_ribbon_zoom		= $iw_ribbon.children('span.iw_zoom');
					
					ImageWall	= (function() {
							// window width and height
						var w_dim,
						    // index of current image
							current				= -1,
							isRibbonShown		= false,
							isFullMode			= false,
							// ribbon / images animation settings
							ribbonAnim			= {speed : 500, easing : 'easeOutExpo'},
							imgAnim				= {speed : 400, easing : 'jswing'},
							// init function : call masonry, calculate window dimentions, initialize some events
							init				= function() {
								$iw_thumbs.imagesLoaded(function(){
									$iw_thumbs.masonry({
										isAnimated	: true
									});
								});
								getWindowsDim();
								initEventsHandler();
							},
							// calculate window dimentions
							getWindowsDim		= function() {
								w_dim = {
									width	: $(window).width(),
									height	: $(window).height()
								};
							},
							// initialize some events
							initEventsHandler	= function() {
								
								// click on a image
								$iw_thumbs.delegate('li', 'click', function() {
									if($iw_ribbon.is(':animated')) return false;
									
									var $el = $(this);
									
									if($el.data('ribbon')) {
										showFullImage($el);
									}
									else if(!isRibbonShown) {
										isRibbonShown = true;
										
										$el.data('ribbon',true);
										
										// set the current
										current = $el.index();
									
										showRibbon($el);
									}
								});
								
								// click ribbon close
								$iw_ribbon_close.bind('click', closeRibbon);
								
								// on window resize we need to recalculate the window dimentions
								$(window).bind('resize', function() {
											getWindowsDim();
											if($iw_ribbon.is(':animated'))
												return false;
											closeRibbon();
										 })
								         .bind('scroll', function() {
											if($iw_ribbon.is(':animated'))
												return false;
											closeRibbon();
										 });
								
							},
							showRibbon			= function($el) {
								var	$img	= $el.children('img'),
									$descrp	= $img.next();
								
								// fadeOut all the other images
								$iw_thumbs.children('li').not($el).animate({opacity : 0.2}, imgAnim.speed);
								
								// increase the image z-index, and set the height to 100px (default height)
								$img.css('z-index', 100)
									.data('originalHeight',$img.height())
									.stop()
									.animate({
										height 		: '100px'
									}, imgAnim.speed, imgAnim.easing);
								
								// the ribbon will animate from the left or right
								// depending on the position of the image
								var ribbonCssParam 		= {
										top	: $el.offset().top - $(window).scrollTop() - 6 + 'px'
									},
									descriptionCssParam,
									dir;
								
								if( $el.offset().left < (w_dim.width / 2) ) {
									dir = 'left';
									ribbonCssParam.left 	= 0;
									ribbonCssParam.right 	= 'auto';
								}
								else {
									dir = 'right';
									ribbonCssParam.right 	= 0;
									ribbonCssParam.left 	= 'auto';
								}
								
								$iw_ribbon.css(ribbonCssParam)
								          .show()
										  .stop()
										  .animate({width : '100%'}, ribbonAnim.speed, ribbonAnim.easing, function() {
												switch(dir) {
													case 'left' :
														descriptionCssParam		= {
															'left' 			: $img.outerWidth(true) + 'px',
															'text-align' 	: 'left'
														};
														break;
													case 'right' :	
														descriptionCssParam		= {
															'left' 			: '-200px',
															'text-align' 	: 'right'
														};
														break;
												};
												$descrp.css(descriptionCssParam).fadeIn();
												// show close button and zoom
												$iw_ribbon_close.show();
												$iw_ribbon_zoom.show();
										  });
								
							},
							// close the ribbon
							// when in full mode slides in the middle of the page
							// when not slides left
							closeRibbon			= function() {
								isRibbonShown 	= false;
								
								$iw_ribbon_close.hide();
								$iw_ribbon_zoom.hide();
								
								if(!isFullMode) {
								
									// current wall image
									var $el	 		= $iw_thumbs.children('li').eq(current);
									
									resetWall($el);
									
									// slide out ribbon
									$iw_ribbon.stop()
											  .animate({width : '0%'}, ribbonAnim.speed, ribbonAnim.easing); 
										  
								}
								else {
									$iw_ribbon.stop().animate({
										opacity		: 0.8,
										height 		: '0px',
										marginTop	: w_dim.height/2 + 'px' // half of window height
									}, ribbonAnim.speed, function() {
										$iw_ribbon.css({
											'width'		: '0%',
											'height'	: '126px',
											'margin-top': '0px'
										}).children('img').remove();
									});
									
									isFullMode	= false;
								}
							},
							resetWall			= function($el) {
								var $img		= $el.children('img'),
									$descrp		= $img.next();
									
								$el.data('ribbon',false);
								
								// reset the image z-index and height
								$img.css('z-index',1).stop().animate({
									height 		: $img.data('originalHeight')
								}, imgAnim.speed,imgAnim.easing);
								
								// fadeOut the description
								$descrp.fadeOut();

								// fadeIn all the other images
								$iw_thumbs.children('li').not($el).animate({opacity : 1}, imgAnim.speed);								
							},
							showFullImage		= function($el) {
								isFullMode	= true;
								
								$iw_ribbon_close.hide();
								
								var	$img	= $el.children('img'),
									large	= $img.data('img'),
								
									// add a loading image on top of the image
									$loading = $('<span class="iw_loading"></span>');
								
								$el.append($loading);
								
								// preload large image
								$('<img/>').load(function() {
									var $largeImage	= $(this);
									
									$loading.remove();
									
									$iw_ribbon_zoom.hide();
									
									resizeImage($largeImage);
									
									// reset the current image in the wall
									resetWall($el);
									
									// animate ribbon in and out
									$iw_ribbon.stop().animate({
										opacity		: 1,
										height 		: '0px',
										marginTop	: '63px' // half of ribbons height
									}, ribbonAnim.speed, function() {
										// add the large image to the DOM
										$iw_ribbon.prepend($largeImage);
										
										$iw_ribbon_close.show();
										
										$iw_ribbon.animate({
											height 		: '100%',
											marginTop	: '0px',
											top			: '0px'
										}, ribbonAnim.speed);
									});
								}).attr('src',large);
									
							},
							resizeImage			= function($image) {
								var widthMargin		= 100,
									heightMargin 	= 100,
								
									windowH      	= w_dim.height - heightMargin,
									windowW      	= w_dim.width - widthMargin,
									theImage     	= new Image();
									
								theImage.src     	= $image.attr("src");
								
								var imgwidth     	= theImage.width,
									imgheight    	= theImage.height;

								if((imgwidth > windowW) || (imgheight > windowH)) {
									if(imgwidth > imgheight) {
										var newwidth 	= windowW,
											ratio 		= imgwidth / windowW,
											newheight 	= imgheight / ratio;
											
										theImage.height = newheight;
										theImage.width	= newwidth;
										
										if(newheight > windowH) {
											var newnewheight 	= windowH,
												newratio 		= newheight/windowH,
												newnewwidth 	= newwidth/newratio;
										
											theImage.width 		= newnewwidth;
											theImage.height		= newnewheight;
										}
									}
									else {
										var newheight 	= windowH,
											ratio 		= imgheight / windowH,
											newwidth 	= imgwidth / ratio;
										
										theImage.height = newheight;
										theImage.width	= newwidth;
										
										if(newwidth > windowW) {
											var newnewwidth 	= windowW,
											    newratio 		= newwidth/windowW,
												newnewheight 	= newheight/newratio;
									
											theImage.height 	= newnewheight;
											theImage.width		= newnewwidth;
										}
									}
								}
									
								$image.css({
									'width'			: theImage.width + 'px',
									'height'		: theImage.height + 'px',
									'margin-left'	: -theImage.width / 2 + 'px',
									'margin-top'	: -theImage.height / 2 + 'px'
								});							
							};
							
						return {init : init};	
					})();
				
				ImageWall.init();
			});
		</script>
    </body>
</html>
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