<?php
if(isset($_GET['watching'])){
	include('github_fopen.php');
	$github=new GithubApi('num16:num16num16');
	$watching=$github->watching();
	die(json_encode($watching));
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
			var readmeCount=0;
			for(i in data){
				var item='<div class="item">';
				item+='<h3><a href="'+data[i].html_url+'" target="_blank">['+data[i].full_name+']</a> '+data[i].description+'</h3>';
				item+='创建于：'+data[i].created_at;
				item+=' &nbsp;&nbsp; 最后更新于：'+data[i].pushed_at;
				item+='<br/>项目管理者：'+data[i].owner.login;
				item+='<pre id="projectReadme'+readmeCount+'"></pre>';
				readmeCount++;
				$c.append(item);
			}
		},'JSON');
	});
	</script>
<?php
}
require_once('common_view.php');
?>