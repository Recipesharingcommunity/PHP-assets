<?php

include('connect.php');

try{
    
    if(isset($_POST['login'])){

      if(empty($_POST['username'])){
         throw new Exception("Username is required!");
      }

      if(empty($_POST['password'])){
         throw new Exception("Password is required!");
      }
        $sql="SELECT * FROM signupinfo WHERE username='$_POST[username]' AND password='$_POST[password]'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) == 0){
            echo "<script>alert('Username or Password is Wrong. Please Try Again.')</script>";
        }
        else{
            header('location: landing.html');
        }

        if(!$result){
          echo "ERROR: Could not able to execute $sql. " . mysql_error($conn); 
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
    <title>Login</title>
    <!--Landing CSS-->
    <link rel="stylesheet" href="CSS/login.css"/>
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
    <!--Form Section-->
    <form method="post">
    <div class="form">
      <h1 id="H1">Login</h1>
      <p><i class="fa-solid fa-user"></i> Username</p>
      <input type="text" name="username" placeholder="Enter Your Name" required/>
      <p><i class="fa-solid fa-lock"></i> Password</p>
      <input type="password" name="password" placeholder="Enter Your Password" required/><br />
      <button type="submit" name="login">LOGIN</button>
      <button type="reset" name="reset">RESET</button>
      <p>
        New User ?
        <a
          href="signup.php"
          style="text-decoration: none; color: blue; font-weight: bolder"
          >Register</a>
      </p>
      </form>
    </div>
    <!--Backgroung Image-->
  </body>
</html>
