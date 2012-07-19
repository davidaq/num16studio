<?php
define('REPO','davidaq/num16studio');
include 'github.php';
if(isset($_GET['list'])){
	$github=new GithubApi('num16:num16num16');
	$c=$github->content(REPO,'');
	var_dump($c);
	die();
}

$_title='#16 Studio Friendly Links';
$_curNav='';
function _display(){
	$github=new GithubApi('num16:num16num16');
	$repo=json_decode($github->repo(REPO),true);
	var_dump($repo);
?>
	<script type="text/javascript">
		function startUpdate(){
			$('#updateInfo').html('');
		}
	</script>
	<div class="sloganLeft fixedWidth">
		日新月异，心意更新
	</div>
	<div class="sloganRight fixedWidth">
		让网站与Github上项目同步
	</div>
	<div class="whiteBack fixedWidth">
		<h2>源项目概况</h2>
		<p>
			源项目：
			<a href="<?php echo $repo['html_url'];?>" target="_blank"><?php echo $repo['full_name'];?></a>
		</p>
		<p>
			克隆地址：
			<?php echo $repo['clone_url'];?>
		</p>
		<p>
			更新于：
			<?php echo $repo['pushed_at'];?>
		</p>
	</div>
	<div class="whiteBack fixedWidth">
		<h2>更新网站</h2>
		<div id="updateInfo">
			最后更新于：<b><?php @readfile('update.info.php');?></b>
			<a href="javascript:void(0);" onclick="startUpdate()">开始更新</a>
		</div>
	</div>
<?php
}
require_once('common_view.php');
?>