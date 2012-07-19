<?php
if(isset($_GET['watching'])){
	include('github.php');
	$github=new GithubApi('num16:num16num16');
	$watching=$github->watching();
	die(json_encode($watching));
}elseif(isset($_GET['readme'])){
	include('github.php');
	$github=new GithubApi('num16:num16num16');
	die($github->readme($_GET['readme']));
}elseif(isset($_GET['thumb']))
{
	include('github.php');
	$github=new GithubApi('num16:num16num16');
	header('Content-type:image/jpeg');
	$img=$github->content($_GET['thumb'],'thumb.jpg');
	if(is_null($img))
		$img=implode('',file('images/404.jpg'));
	die($img);
}
$_title='#16 Studio Projects';
$_curNav='projects';

function _display(){
?>
	<div class="sloganLeft fixedWidth">
		开源是一种程序员传统美德，但盈利是我们生存之本
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
			//var readmeCount=0;
			for(i in data){
				var item='<div class="item">';
				var name=data[i].full_name.split('/');
				name=name[1];
				item+='<div class="thumb"><div class="frame">';
				item+='<img src="projects.php?thumb='+data[i].full_name+'"/><div class="overlay"></div>';
				item+='</div></div><div class="text">';
				item+='<h3><a href="'+data[i].html_url+'" target="_blank">['+name+']</a> '+data[i].description+'</h3>';
				item+='<div class="info">管理者：'+data[i].owner.login;
				item+=' &nbsp;&nbsp; 创建于：'+data[i].created_at;
				item+=' &nbsp;&nbsp; 最后更新于：'+data[i].pushed_at;
				item+=' &nbsp;&nbsp; 克隆地址：'+data[i].clone_url;
				item+='</div></div></div>';
				
				//item+='<pre id="projectReadme'+readmeCount+'"><i>自述文件加载中。。。</i></pre>';
				$c.append(item);
				/*function tempF(){
					var readme=readmeCount;
					$.get('projects.php',{'readme':data[i].full_name},function(data){
						$('#projectReadme'+readme).html(data);
					});
				}
				tempF();
				readmeCount++;*/
			}
		},'JSON');
	});
	</script>
<?php
}
require_once('common_view.php');
?>