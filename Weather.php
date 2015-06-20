<form action="" method="post">
	<input type="text" name="city"/>        
	<input type="submit"/>
</form>

<?php
	header("Content-type: text/html; charset=utf-8"); 
	
function show_weather($city="石家庄"){ 
	$location=$city;
	$ak="rct7nOT2tnk6zYM983v7q7F3";
	$output="json";
	$url="http://api.map.baidu.com/telematics/v3/weather?location=".$location."&output=".$output."&ak=".$ak;
	$res=file_get_contents($url);
	// var_dump($res);
	echo "<hr/>";
	$decode=json_decode($res);
	// var_dump($decode);
	echo "<hr/>";
	echo "状态 : ".$decode->status;
	echo "<hr/>";
	echo "城市 : ".$decode->results[0]->currentCity;
	echo "<hr/>";
	echo "建议 : ".$decode->results[0]->index[0]->des;	

	echo "<hr/>";
	echo "星期 : ".$decode->results[0]->weather_data[0]->date;


	echo "<hr/>";
	$day_img=$decode->results[0]->weather_data[0]->dayPictureUrl;
	echo "DAY  Weather IMG : ";
	echo "<img src='".$day_img."'/>";

	echo "<hr/>";
	$night_img=$decode->results[0]->weather_data[0]->nightPictureUrl;
	echo "DAY  Weather IMG : ";
	echo "<img src='".$night_img."'/>";

	echo "<hr/>";
	echo "风向: ".$decode->results[0]->weather_data[0]->wind;

	echo "<hr/>";
	echo "温度: ".$decode->results[0]->weather_data[0]->temperature;
}

	$receive_city=@$_POST['city'];
	// echo "city is :".$receive_city;
	if(!empty($receive_city)){ 
		show_weather($receive_city);
	}else{
		show_weather();
	}
?>