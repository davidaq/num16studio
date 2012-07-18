<?php
if(!function_exists('_display'))
	die();
?>
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
		<a href="">首页</a>
		<a href="">博客</a>
		<a href="">在做项目</a>
		<a href="">关于我们</a>
		<a href="">联系我们</a>
		<a href="">友情链接</a>
		<span class="bottom"></span>
	</div>
	
	<?php _display();?>	
</body>
</html>