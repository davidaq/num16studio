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
</head>
<body>
	<div class="header fixedWidth"><img src="images/logo.png" class="logo"/></div>
	<div class="nav fixedWidth">
		<span class="top"></span>
		<a href="index.php">首页</a>
		<a href="blog" target="_blank">博客</a>
		<a href="projects.php">在做项目</a>
		<a href="aboutus.php">关于我们</a>
		<a href="contact.php">联系我们</a>
		<a href="links.php">友情链接</a>
		<span class="bottom"></span>
	</div>
	
	<?php _display();?>	
	
	
	<div class="stripTop"></div>
	<div class="strip">
		<?php
		$randomText=array(
			'是时候把一些梦想变成现实了，不是吗？',
			'不要限制自己的想象力！',
			'埋头苦干终究会有收获的。',
			'默默无闻只是暂时的，金子总是会发光的！',
			'成功总在失败之后，不尝试只会错过'
		);
		echo $randomText[rand(0,count($randomText)-1)];
		?>
	</div>
	<div class="footer fixedWidth">
		Theme inspired by <a href="http://www.elegantthemes.com/">Elegant Themes</a> | Web page coded by DavidAQ
	</div>
</body>
</html>