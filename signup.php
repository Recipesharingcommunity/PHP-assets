<?php

include('connect.php');

try{
    
    if(isset($_POST['signup'])){

      if(empty($_POST['username'])){
         throw new Exception("Username can't be empty.");
      }

      if(empty($_POST['password'])){
         throw new Exception("Password can't be empty.");
      }

      if(empty($_POST['phoneno'])){
        throw new Exception("PhoneNo can't be empty.");
      
      }
        $user="SELECT * FROM signupinfo where phoneno = '$_POST[phoneno]'";
        $query=mysqli_query($conn,$user);
        if(mysqli_num_rows($query) > 0){
          echo "<script>alert('User Already Exists')</script>";
        }
        else{
        $sql="INSERT INTO signupinfo(username,password,phoneno) VALUES('$_POST[username]','$_POST[password]','$_POST[phoneno]')";
        $result = mysqli_query($conn,$sql);

        if(!$result){
          echo "ERROR: Could not able to execute $sql. " . mysql_error($conn); 
        }
        $success_msg="<script>alert('Signed Up Successfully! Now Login')</script>";
      }
    }
}
catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <!--Landing CSS-->
    <link rel="stylesheet" href="CSS/signup.css" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <!--Title icon-->
    <link
      rel="icon"
      href="https://eastmanscorner.com/wp-content/uploads/2015/01/cooking-icon.png"
    />
    <!--Font Awesome cdn-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>

    <center>
    <?php
    if(isset($success_msg)) echo $success_msg;
    if(isset($error_msg)) echo $error_msg;
     ?>
    </center>

    <!--Form Section-->
    <form method="post">
    <div class="form">
      <h1 id="H1">Signup</h1>
      <p><i class="fa-solid fa-user"></i> Username</p>
      <input type="text" name="username" placeholder="Enter Your Name" required/>
      <p><i class="fa-solid fa-lock"></i> Password</p>
      <input type="password" name="password" placeholder="Enter Your Password" required/>
      <p><i class="fa-solid fa-phone"></i> Phone</p>
      <input type="number" name="phoneno" placeholder="Enter Your Number" required/><br />
      <button type="submit" name="signup">SIGNUP</button>
      <button type="reset" name="reset">RESET</button>  
      <p>
        Already Have Account ?
        <a
          href="login.php"
          style="text-decoration: none; color: blue; font-weight: bolder"
          >Login</a
        >
      </p>  
    </div>
    </form>
    <!--Backgroung Image-->
  </body>
</html>
