<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>
<div class="row">
   <center> <h1> Landing Page </h1> </center>
   <hr><br>
   <div class="col-xs-2 col-xs-offset-3">
      <form action="landing.php" method="post">
         <div class="form-group">
               <input type="submit" name="Login" value="Login" class="btn btn-primary" >
         </div>
      </form>
   </div>
   <div class="col-xs-3 col-xs-offset-3">
      <form action="" method="post">
          <div class="form-group">
               <input type="submit" name="Signup" value="Signup" class="btn btn-primary" >
         </div>
      </form>
   </div>
</div>
</body>
</html>




<?php

   
   	if(isset($_POST['Login']))
   	{
   	   header('location:login.php');
      } 
      else if(isset($_POST['Signup']))
      {
   	   header('location:signup.php');
      }

?>
