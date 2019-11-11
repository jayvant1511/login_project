<?php
if(isset($_POST['button'])){
    
    $name = $_POST['user'];
    $password = $_POST['pass'];
    
    echo "name = ".$name."<br>"."password = ".$password;
    echo "<br>";
    
    $connection = mysqli_connect('localhost','root','','loginapp');
        
        if($connection){
            echo "success"."<br>";
            
        }
        else{
            echo "fail";
        } 

      $query ="SELECT * FROM users WHERE username = '$name' && password = '$password'";
      $data = mysqli_query($connection, $query);
    
      $result = mysqli_num_rows($data);
        
    if($result)
    {
         session_start();
         $_SESSION['user_name'] = $name;
         $time_now = mktime(date('h') + 4, date('i') + 30, date('s'));
         $time = date('d-m-y H:i', $time_now);
         setcookie('lastvisit',$time );
         $_SESSION['time_expire']= time() + 10;
         header ('location:HOME.php');
    }
    else{
        ?>
            <HTML> <script> alert("invalid usernamae or password")</script> </HTML>
        <?php
        
    }
        
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>
   <center> <h1> Login Page </h1> </center>
                <hr><br>
   
    <div class="col-xs-6 col-xs-offset-3">
        
        <form action="login.php" method="post">
          <div class="form-group">
              <label for="username"> <h4> Username </h4> </label>  
              <input type="text" class="form-control" name="user">
          </div>
          <div class="form-group">
              <label for="password"> <h4> Password </h4></label>
              <input type="password" class="form-control" name="pass">
          </div>
    
          <input type="submit" value="click" class = "btn btn-primary" name="button">
         </form>
        
    </div>
    

    
</body>
</html>
