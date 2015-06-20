<?php
for($i=1;$i<400;$i++){ 
			$id=$i;
			$md5_string=md5($id);
			$first_string=substr($md5_string,0,4);
			$second_string=substr($md5_string,4,4);
			// echo "id : ".$id."<br/>";
			// echo "md5_string : ".$md5_string."<br/>";
			// echo "first_string : ".$first_string."<br/>";
			// echo "second_string : ".$second_string."<br/>";
			$url="http://cdn.v2ex.co/avatar/".$first_string."/".$second_string."/".$id."_"."large.png";
			// echo "url : ".$url."<br/>";
			echo  "<img src='".$url."'/>";
       }
?>

