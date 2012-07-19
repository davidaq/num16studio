<?php
if(isset($_GET['watching'])){
	include('github.php');
	$github=new GithubApi();
	$watching=$github->watching('num16');
	die(json_encode($watching));
}elseif(isset($_GET['thumb'])){
	include('github.php');
	$github=new GithubApi();
	$img=$github->content($_GET['thumb'],'thumb.jpg');
	if(is_null($img)){
		header('location:images/404.jpg');
		die();
	}
	header('Content-type:image/jpeg');
	die($img);
}
$_title='#16 Studio Projects';
$_curNav='projects';

function _display(){
?>
	<div class="sloganLeft fixedWidth">
		开源是一种程序员传统美德
	</div>
	<div class="sloganRight fixedWidth">
		我们的项目均使用Git做项目维护，且可在 <a href="https://github.com">Github</a> 上找到。
	</div>
	<div class="shelf fixedWidth" id="projectShelf">
		<div style="text-align:center;line-height:150px;font-size:15px;color:#333">正在从Github获取信息。。。</div>
	</div>
	<script text="text/javascript">
	$(function(){
		$.get('projects.php?watching',function(data){
			var $c=$('#projectShelf');
			$c.html('');
			for(i in data){
				var item='<div class="item">';
				var name=data[i].full_name.split('/');
				name=name[1];
				item+='<div class="thumb"><div class="frame">';
				item+='<img src="projects.php?thumb='+data[i].full_name+'"/><div class="overlay"></div>';
				item+='</div></div><div class="text">';
				item+='<h3><a href="'+data[i].html_url+'" target="_blank">'+name+'</a></h3>';
				item+='<div class="info">由<span>'+data[i].owner.login;
				item+='</span>创建于<span>'+data[i].created_at;
				item+='</span> &nbsp; | &nbsp; 最后更新于<span>'+data[i].pushed_at;
				item+='</span> &nbsp; | &nbsp; 使用语言：<span>'+data[i].language+'</span>';
				item+='</div><div class="description">'+data[i].description+'</div>';
				item+='<div class="cloneUrl">Git项目克隆地址 <input onmouseup="this.select()" type="text" value="'+data[i].clone_url+'"/></div></div>';
				$c.append(item);
			}
		},'JSON').error(function(err){
			$('#projectShelf div').html('加载失败！请稍后刷新重试');
		});
	});
	</script>
<?php
}
require_once('common_view.php');
?>