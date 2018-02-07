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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>点击地图获取地址和经纬度map，address，lng，lat</title>
	<meta name="robots" content="noindex, nofollow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- 将百度地图API引入，设置好自己的key -->
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7a6QKaIilZftIMmKGAFLG7QT1GLfIncg"></script>
</head>
<body>

<div class="main-div">
	<form method="post" action="" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
		<table cellspacing="1" cellpadding="3" width="100%">
			<tr>
				<td class="label">经度</td>
				<td><input type="text" name="lng" id="lng" value=""/>
				</td>
			</tr>
			<tr>
				<td class="label">纬度</td>
				<td><input type="text" name="lat" id="lat" value=""/>
				</td>
			</tr>
			<tr>
				<td class="label">地址</td>
				<td>
					<input type='text' value='' name='sever_add' id='sever_add' readonly>
					<input type='button' value='点击显示地图获取地址经纬度' id='open'>
				</td>
			</tr>
		</table>
	</form>
	<div id='allmap' style='width: 50%; height: 50%; position: absolute; display: none'></div>
</div>
</body>
</html>

<script type="text/javascript">
	function validate() {
		var sever_add = document.getElementsByName('sever_add')[0].value;
		if (isNull(sever_add)) {
			alert('请选择地址');
			return false;
		}
		return true;
	}

	//判断是否是空
	function isNull(a) {
		return (a == '' || typeof(a) == 'undefined' || a == null) ? true : false;
	}

	document.getElementById('open').onclick = function () {
		if (document.getElementById('allmap').style.display == 'none') {
			document.getElementById('allmap').style.display = 'block';
		} else {
			document.getElementById('allmap').style.display = 'none';
		}
	}

	var map = new BMap.Map("allmap");
	var geoc = new BMap.Geocoder();   //地址解析对象
	var markersArray = [];
	var geolocation = new BMap.Geolocation();


	var point = new BMap.Point(116.331398, 39.897445);
	map.centerAndZoom(point, 12); // 中心点
	geolocation.getCurrentPosition(function (r) {
		if (this.getStatus() == BMAP_STATUS_SUCCESS) {
			var mk = new BMap.Marker(r.point);
			map.addOverlay(mk);
			map.panTo(r.point);
			map.enableScrollWheelZoom(true);
		}
		else {
			alert('failed' + this.getStatus());
		}
	}, {enableHighAccuracy: true})
	map.addEventListener("click", showInfo);


	//清除标识
	function clearOverlays() {
		if (markersArray) {
			for (i in markersArray) {
				map.removeOverlay(markersArray[i])
			}
		}
	}
	//地图上标注
	function addMarker(point) {
		var marker = new BMap.Marker(point);
		markersArray.push(marker);
		clearOverlays();
		map.addOverlay(marker);
	}
	//点击地图时间处理
	function showInfo(e) {
		document.getElementById('lng').value = e.point.lng;
		document.getElementById('lat').value =  e.point.lat;
		geoc.getLocation(e.point, function (rs) {
			var addComp = rs.addressComponents;
			var address = addComp.province + addComp.city + addComp.district + addComp.street + addComp.streetNumber;
			if (confirm("确定要地址是" + address + "?")) {
				document.getElementById('allmap').style.display = 'none';
				document.getElementById('sever_add').value = address;
			}
		});
		addMarker(e.point);
	}
</script>
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