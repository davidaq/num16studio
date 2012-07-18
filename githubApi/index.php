<?php
require_once('api.php');
$github=new GithubApi('davidaq:123@dav');
//echo '<meta charset="utf-8"/>';
$repo=$github->downloadUrl('davidaq/xqsx','tar');
echo($repo);
?>