<?php
$_title='#16 Studio';

function _display(){
	$_slide=array(
		array(
			'thumb'=>'images/slideshow/slide-1-thumb.png',
			'image'=>'images/slideshow/slide-1.png',
			'title'=>'',
			'text'=>''
		),
		array(
			'thumb'=>'images/slideshow/slide-2-thumb.png',
			'image'=>'images/slideshow/slide-2.png',
			'title'=>'',
			'text'=>''
		),
		array(
			'thumb'=>'images/slideshow/slide-3-thumb.png',
			'image'=>'images/slideshow/slide-3.png',
			'title'=>'',
			'text'=>''
		),
		array(
			'thumb'=>'images/slideshow/slide-4-thumb.png',
			'image'=>'images/slideshow/slide-4.png',
			'title'=>'',
			'text'=>''
		)
	);
?>
	<div class="slideShow fixedWidth">
		<div class="screen">
			<div class="frame">
				<?php
				$i=0;
				foreach($_slide as $f){
					echo '<img class="num'.$i.'" src="'.$f['image'].'"/>';
					$i++;
				}
				?>
				<div class="overlay"></div>
			</div>
		</div>		
		<div class="board"></div>
		<div class="thumb"></div>
	</div>
<?php
}
require_once('common_view.php');
?>