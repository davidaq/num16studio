<?php
$_title='#16 Studio Friendly Links';
$_curNav='links';

function _display(){
	$links=array(
		array('Ming++ Blog','http://mingplusplus.com'),
		array('Tsenmu Scholar','http://scholar.tsenmu.com/'),
		array('Github','https://github.com')
	);
?>
<div class="sloganLeft fixedWidth">
	大量的友谊使生命坚强
</div>
<div class="sloganRight fixedWidth">
	友谊是互相支持的
</div>
<div class="fixedWidth" style="overflow:hidden;zoom:1">
<?php
	foreach($links as $f){
	echo <<<HTML
	<div class="whiteBack friendLinks">
		<a href="{$f[1]}" target="_blank">{$f[0]}</a>
	</div>
HTML;
	}
?>
</div>
<?php
}
require_once('common_view.php');
?>