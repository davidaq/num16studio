<?php
define('REPO','davidaq/num16studio');
include 'github.php';
if(isset($_GET['list'])){
	//die('{"mk":["update.info.php","update_new.info.php","updater.php"],"rm":[]}');
	$github=new GithubApi('num16:num16num16');
	$files=array();
	function ls($path=''){
		global $github;
		global $files;
		$path=preg_replace('/\/{2,}/','\/',$path);
		if($path{0}=='/')
			$path=substr($path,1);
		$c=$github->content(REPO,$path);
		foreach($c as $f){
			if($f['type']=='dir'){
				ls($path.'/'.$f['path']);
			}else
			{
				$files[$f['path']]=$f['sha'];
			}
		}
	}
	ls();
	$buff=json_encode($files);
	$local=file('update.info.php');
	unset($local[0]);
	$local=json_decode(implode('',$local),true);
	if(is_null($local))
		$local=array();
	$mkList=array();
	$rmList=array();
	foreach($local as $k=>$v){
		if(!isset($files[$k]))
			$rmList[]=$k;
		else if($files[$k]==$v)
			unset($files[$k]);
	}
	foreach($files as $k=>$v){
		$mkList[]=$k;
	}
	$fp=fopen('update_new.info.php','w');
	fwrite($fp,date('Y-m-d H:i:s',time()).chr(10));
	fwrite($fp,$buff);
	fclose($fp);
	die(json_encode(array('mk'=>$mkList,'rm'=>$rmList)));
}elseif(isset($_GET['rm'])){
	$rm=preg_replace('/\.{2,}/','.',$_GET['rm']);
	unlink($rm);
	die('ok');
}elseif(isset($_GET['mk'])){
	$mk=preg_replace('/\.{2,}/','.',$_GET['mk']);
	$github=new GithubApi('num16:num16num16');
	$fp=fopen($mk,'w');
	fwrite($fp,$github->content(REPO,$mk));
	fclose($fp);
	die('ok');
}elseif(isset($_GET['done'])){
	rename('update_new.info.php','update.info.php');
}

$_title='#16 Studio Friendly Links';
$_curNav='';
function _display(){
	$github=new GithubApi('num16:num16num16');
	$repo=json_decode($github->repo(REPO),true);
?>
	<script type="text/javascript">
		function startUpdate(){
			var $c=$('#updateInfo');
			var reset=$c.html();
			var jobC=0;
			var jobCount=0;
			$c.html('<div>正在获取更新信息……</div>');
			$.get('updater.php?list',function(data){
				if(data.rm.length==0&&data.mk.length==0)
					$c.append('<div>没有可以更新的内容</div>');
				else
				{
					function job(url,id){
						$.get(url,function(data){
							if(data=='ok'){
								$('#job'+id).addClass('ok');
							}else
								$('#job'+id).addClass('bad');
							jobCount--;
							if(jobCount==0){
								$.get('updater.php?done',function(data){
									if(data=='ok')
										$c.append('<div>更新完毕</div>');
								});
							}
						}).error(function(){
							$('#job'+id).addClass('bad');
						});
					}
					for(i in data.rm){
						$c.append('<div class="job" id="job'+jobC+'">删除 '+data.rm[i]+'</div>');
						job('updater.php?rm='+data.rm[i],jobC);
						jobC++;
						jobCount++;
					}
					for(i in data.mk){
						$c.append('<div class="job" id="job'+jobC+'">下载 '+data.mk[i]+'</div>');
						job('updater.php?mk='+data.rm[i],jobC);
						jobC++;
						jobCount++;
					}
				}
			},'JSON').error(function(){
				alert('更新失败');
				$c.html(reset);
			});
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
			最后更新于：<b><?php $f=fopen('update.info.php','r');echo fgets($f);fclose($f)?></b>
			<a href="javascript:void(0);" onclick="startUpdate()">开始更新</a>
		</div>
	</div>
<?php
}
require_once('common_view.php');
?>