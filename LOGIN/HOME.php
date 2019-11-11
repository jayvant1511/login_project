<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
    <div container>
				<center> <h1> Home Page </h1> </center>
                <hr><br>
    	<div class="col-xs-1 col-xs-offset-5">
    		<form action="HOME.php" method="post">
    			<input type="submit" name="submit" value="Logout" class="btn btn-primary" >       
       		</form>
    	</div>
    </div>
   
</body>
</html>
<?php

session_start();

if(!isset($_SESSION['user_name']))
{
	header('location:landing.php');
}
else if(time() > $_SESSION['time_expire'])
	{
		session_destroy();
		?>
		<script> alert("Time Out")</script>

<?php
		header('location:login.php');
	}
	else
	{
		echo "Welcome ".$_SESSION['user_name']."<br>"; 
	
		$user = $_SESSION['user_name'];

	
		$connect = mysqli_connect('localhost','root','','loginapp');
		$query ="SELECT * FROM users WHERE username = '$user' ";
    	$data = mysqli_query($connect, $query);
    
    	$result = mysqli_fetch_assoc($data);
    	
    	if(isset($_COOKIE['lastvisit']))
		{
		$visit = $_COOKIE['lastvisit'];
		echo "<b>Login Time = $visit <br></b>";
		}
		
    	echo "name = ".$result['username']."<br>";
		echo "email = ".$result['email']."<br>";
		echo "password = ".$result['password']."<br>";
		echo "gender = ".$result['gender']."<br>";
		echo "birthday = ".$result['birthday']."<br>";
		echo $result['image'];
		?>
		<img src=" <?php echo $result['image'];   ?>" height="200" width="200" >
		<?php
   		
   		 	
   
   			if(isset($_POST['submit']))
  			 {
  				 echo "Thank You";
  				 $_SESSION['variable'] = 0;
  				 session_unset();
  			   	 header('location:login.php');
  			} 
	
    }
	
?>

