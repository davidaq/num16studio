<?php
if(!function_exists('_display'))
	die();
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title><?php echo $_title;?></title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="style.js"></script>
	<script type="text/javascript">
	$(function(){
		$('.nav .<?php echo $_curNav;?>').addClass('current');
	});
	</script>
</head>
<body>
	<div class="header fixedWidth"><img src="images/logo.png" class="logo"/></div>
	<div class="nav fixedWidth">
		<span class="top"></span>
		<a href="index.php" class="home">首页</a>
		<a href="blog" target="_blank">博客</a>
		<a href="projects.php" class="projects">项目</a>
		<a href="aboutus.php" class="aboutus">关于我们</a>
		<a href="contact.php" class="contact">联系我们</a>
		<a href="links.php" class="links">友情链接</a>
		<span class="bottom"></span>
	</div>
	
	<?php _display();?>	
	
	
	<div class="stripTop"></div>
	<div class="strip">
		<?php
		$randomText=array(
			'是时候把一些梦想变成现实了，不是吗？',
			'天才从不限制自己的想象力！',
			'埋头苦干终究会有收获的',
			'默默无闻只是暂时的，金子总是会发光的！',
			'成功总在失败之后，不尝试只能错过',
			'再多各自牛逼的时光，都比不上一起傻逼的岁月'
		);
		echo $randomText[rand(0,count($randomText)-1)];
		?>
	</div>
	<div class="footer fixedWidth">
		Theme inspired by <a href="http://www.elegantthemes.com/">Elegant Themes</a> | Web page coded by DavidAQ
	</div>
</body>
</html>