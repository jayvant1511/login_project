<html>
<body bgcolor = "18aeet">
<center><h2> Last Login On The Web Page</h2></center>
<br>
<?php

$time_now = mktime( date('h')+4, date('i')+30, date('s'));
$date = date('d-m-Y H:i', $time_now);


setcookie('time_now',$date,$time_now);


if(isset($_COOKIE['time_now']))
{
	$visit = $_COOKIE['time_now'];
	echo $visit;	
}
else
{
	echo "Hello";
}
?>
</body>
</html>