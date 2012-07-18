<?php
$_title='#16 Studio';

function _display(){
	$_slide=array(
		array(
			'thumb'=>'images/slideshow/slide-1-thumb.png',
			'image'=>'images/slideshow/slide-1.png',
			'title'=>'title1',
			'text'=>'text1'
		),
		array(
			'thumb'=>'images/slideshow/slide-2-thumb.png',
			'image'=>'images/slideshow/slide-2.png',
			'title'=>'title2',
			'text'=>'text2'
		),
		array(
			'thumb'=>'images/slideshow/slide-3-thumb.png',
			'image'=>'images/slideshow/slide-3.png',
			'title'=>'title3',
			'text'=>'text3'
		),
		array(
			'thumb'=>'images/slideshow/slide-4-thumb.png',
			'image'=>'images/slideshow/slide-4.png',
			'title'=>'title4',
			'text'=>'text4'
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