<?php
$_title='#16 Studio';
$_curNav='home';

function _display(){
	$_slide=array(
		array(
			'thumb'=>'images/slideshow/slide-1-thumb.png',
			'image'=>'images/slideshow/slide-1.jpg',
			'title'=>'欢迎来到<br/>16号工作室',
			'text'=><<<MSG
&nbsp;&nbsp;&nbsp;&nbsp;
16号工作室（#16 Studio）是一个软件开发工作室，我们专注于小型软件、网站开发。
我们是一群优秀的程序员，拥有专业的软件开发能力却又不羁于传统，力图开辟出一个真正属于我们程序员自己的软件工作室。
<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;
我们熟悉C++、PHP、.NET等语言，我们熟悉Linux、Mac、Windows下的开发，我们崇尚开放的学习。
MSG
		),
		array(
			'thumb'=>'images/slideshow/slide-2-thumb.png',
			'image'=>'images/slideshow/slide-2.jpg',
			'title'=>'16号工作室<br/>的风格',
			'text'=><<<MSG
&nbsp;&nbsp;&nbsp;&nbsp;
16号工作室的成员们都是优秀的程序员，也是优秀的软件工程师。我们晚睡晚起，可以将咖啡势能转换为代码动能。
<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;
我们欣赏高效简约的风格，拒绝无意义的华丽。我们崇尚创意的时间，拒绝无脑的复制粘贴。我们拥护开源，但我们也拥护知识产权的严格保护！
MSG
		),
		array(
			'thumb'=>'images/slideshow/slide-3-thumb.png',
			'image'=>'images/slideshow/slide-3.jpg',
			'title'=>'16号工作室<br/>的源起',
			'text'=><<<MSG
&nbsp;&nbsp;&nbsp;&nbsp;
北京交通大学16号学生公寓楼，曾经是、如今仍是、将来依然暂时是本工作室的创始者们安枕之地……
<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;
不要误会，身为大学本科生并不制约我们的能力，因为我们都有强大的自学意识，算法、编程、设计、管理只要用得上就会涉及。
MSG
		),
		array(
			'thumb'=>'images/slideshow/slide-4-thumb.png',
			'image'=>'images/slideshow/slide-4.jpg',
			'title'=>'16号工作室<br/>的目标',
			'text'=><<<MSG
&nbsp;&nbsp;&nbsp;&nbsp;
只要是程序员，就会向往Google那样的程序员圣地……我们也向往，但隔着海洋，困难重重。
既然要面对重重困难，我们干脆就想自己为自己营造一个我们自己的圣地……
<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;
这个工作室是实现我们理想的地方，不论成败如何，这将是我们勇气的见证！
MSG
		)
	);
?>
	<div class="slideShow fixedWidth">
		<div class="screen">
			<div class="frame">
				<?php
				$i=0;
				foreach($_slide as $f){
					echo '<img class="item" src="'.$f['image'].'"/>';
					$i++;
				}
				?>
				<div class="overlay"></div>
			</div>
		</div>
		<div class="screenShadow"></div>
		<div class="board">
			<div class="frame">
				<?php
				$i=0;
				foreach($_slide as $f){
					echo '<div class="item"><div class="title">'.$f['title'].'</div><div class="text">'.$f['text'].'</div></div>';
					$i++;
				}
				?>
			</div>
		</div>
		<div class="thumb">
			<?php
			$i=0;
			foreach($_slide as $f){
				echo '<div class="item"><div class="frame"><img class="'.$i.'" src="'.$f['thumb'].'"/><div class="overlay"></div></div></div>';
				$i++;
			}
			?>
		</div>
	</div>
	
	<div class="sloganLeft fixedWidth">
		我们致力于制作更加友好强大的软件与网站
	</div>
	<div class="sloganRight fixedWidth">
		Providing you a better solution of software developing
	</div>
<?php
}
require_once('common_view.php');
?>