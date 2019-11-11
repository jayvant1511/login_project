<?php
if(isset($_POST['submit']))
{
    
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $birthday = $_POST['bday'];
    $mobile = $_POST['mobile'];
    //$image = $_FILES['image']['Images'];
    
    echo "name = ".$name;
    echo "<br>";
    echo "email = ".$email;
    echo "<br>";
    echo "password = ".$password;
    echo "<br>";
    echo "gender = ".$gender;
    echo "<br>";
    echo "birthday = ".$birthday;
    echo "<br>";
    echo "mobile = ".$mobile;
    echo "<br>";
    
    $connection = mysqli_connect('localhost','root','','loginapp');
        
        if($connection){
            echo "success"."<br>";
            
        }
        else{
            echo "fail"."<br>";
        } 

        

		 $query ="SELECT * FROM users WHERE username = '$name' && password = '$password' && email = '$email'";
   		 $data = mysqli_query($connection, $query);
    
         $result = mysqli_num_rows($data);
         
        $query ="SELECT * FROM users WHERE email = '$email'";
           $data = mysqli_query($connection, $query);
           
            $temp_name = $_FILES['image']['tmp_name'];
	        $file_name = $_FILES['image']['name'];
	        $new_path = "Images/".$file_name;
	        echo $new_path;
	        move_uploaded_file($temp_name,$new_path);
    
        $result1 = mysqli_num_rows($data);
        
			if($result)
			{
                echo "already registered"."<br>";
                ?>
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Document</title>
                    </head>
                    <body>
                        <p>
                        click to 
                            <a href="http://localhost/php/login_project/login.php"> 
                            login
                            </a>
                        </p>
                    </body>
                    </html>


                <?php 
            }

			else if($result1)
			{
                echo "E-mail is already used provide another.."."<br>";
            }
            else
            {
                $query = "INSERT INTO users(email,username,password,gender,birthday,mobile,Image) VALUES('$email','$name','$password','$gender','$birthday','$mobile','$new_path')";
    
                $result = mysqli_query($connection,$query);

                if(!$result)
                {
                    die('error');
                }

            session_start();
            $_SESSION['user_name'] = $name;
            $time_now = mktime(date('h') + 4, date('i') + 30, date('s'));
            $time = date('d-m-y H:i', $time_now);
            setcookie('lastvisit',$time );
            $_SESSION['time_expire']= time() + 120;
            header ('location:HOME.php');
            echo "Register Successfully!!";
            header ('location:HOME.php');

            }
       
            
        
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SignUp</title>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
   <div container>
    <div class="col-xs-6 col-xs-offset-3">
        
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <h1>Create an account</h1>
          <div class="form-group">
              <label for="username"> <h4> Username </h4> </label>  
              <input type="text" class="form-control" name="username" required >
          </div>
          
          <div class="form-group">
              <label for="email"> <h4> E-mail </h4> </label>
              <input type="email" class="form-control" name="email" required >
          </div>
          
          <div class="form-group">
              <label for="password"> <h4> Password </h4> </label>
              <input type="password" class="form-control" name="password" required >
          </div>
          
          <br>
          <h3> Gender </h3> 	
          <label for="xender1"> <input type="radio" id="xender1" name="gender" value=male> Male </label>
       	  <label for="xender2"> <input type="radio" id="xender2" name="gender" value=female > Female </label>
          <label for="xender3"> <input type="radio" id="xender3" name="gender" value=custom> Custom </label>
          
          <br><br>
    		 
    		<div class="form-group">
    		    <h4> Date Of Birth </h4>
 			    <input type="date" name="bday" class="form-control" required>
 			</div>
 			
 			<div class="form-group">
    		    <h4> Mobile No </h4>
 			    <input type="tel" name="mobile" class="form-control" pattern="^\d{10}" placeholder="must be 10 digit" required>
 			</div>

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