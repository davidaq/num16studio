<?php
$_title='#16 Studio Projects';
$_curNav='projects';

function _display(){
	include('github_fopen.php');
	$github=new GithubApi('num16:num16num16');
	$watching=$github->watching();
?>
	<div class="sloganLeft fixedWidth">
		开源是一种程序员传统美德，但盈利是我们生存之本
	</div>
	<div class="sloganRight fixedWidth">
		我们的项目均使用Git做项目维护，且可在 <a href="https://github.com">Github</a> 上找到。
	</div>
	<div class="fixedWidth">
		<?php
		foreach($watching as $f){
		?>
		
		<?php
		}
		?>
	</div>
<?php
}
require_once('common_view.php');
?>