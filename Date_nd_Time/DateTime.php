<?php 

//date_default_timezone_set("Asia/Karachi"); //You can chage time Zone As you wish
date_default_timezone_set("Asia/Kolkata");
$CurrentTime = time();
//$DateTime = strftime("%Y-%m-%d  %H: %M: %S",$CurrentTime); // For Other Format You can Go through PHP Official Website
$DateTime = strftime("%B-%d-%Y  %H: %M: %S",$CurrentTime);
echo "$DateTime";


 ?>