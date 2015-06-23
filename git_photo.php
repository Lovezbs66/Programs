<?php
header("Content-type: text/html; charset=utf-8"); 
for($i=1;$i<200;$i++){
	$url="https://avatars1.githubusercontent.com/u/".$i."?v=3&s=460";
	// $res=file_get_contents($url);
	echo "<img style='width:40px;' src='".$url."'/>";
	// echo $res."<hr/>";
}

?>