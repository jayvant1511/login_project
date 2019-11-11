!<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
   <div container>
    <div class="col-xs-6 col-xs-offset-3">
        
        <form action="" method="post" enctype="multipart/form-data">
            

            <div class="form-group">
    		    <h4> File </h4>
 			    <input type="file" name="image" class="form-control" required >
 			</div>
 			 
		    <input type="submit" value="submit" class = "btn btn-primary" name="submit" >
		</form>
         
    </div>
   </div>

    
</body>
</html>


<?php
if(isset($_POST['submit']))
{
	mysqli_connect("localhost","root","","imagedatabase") or die(mysql_error());
	
	//mysqli_select_db("imagedatabase") or die(mysql_error());
	echo "<br><br><br>";
	$temp_name = $_FILES['image']['tmp_name'];
	$file_name = $_FILES['image']['name'];
	$new_path = "/Applications/XAMPP/xamppfiles/htdocs/php/login_project/Images/".$file_name;
	echo $new_path;
	move_uploaded_file($temp_name,$new_path);



}

?>
