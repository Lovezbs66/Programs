<?php
	header("Content-type: text/html; charset=utf-8"); 

	$location="石家庄";
	$ak="rct7nOT2tnk6zYM983v7q7F3";
	$output="xml";
	$url="http://api.map.baidu.com/telematics/v3/weather?location=".$location."&output=".$output."&ak=".$ak;
	$res=file_get_contents($url);
	var_dump($res);

// 开始解析XML
	$xml = simplexml_load_string($res);
	echo "<hr/>";
	var_dump($xml);



//开始解析XML
// $xml = simplexml_load_string($xml_string);
// foreach ($xml->user as $user)
// {
// echo $user['id'], ' ';
// echo $user->name, ' ';
// echo $user->email, '<br />';
// }
?>