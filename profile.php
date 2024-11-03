<?php

include('connect.php');

try{
    
    if(isset($_POST['update'])){

      if(empty($_POST['username'])){
         throw new Exception("Username can't be empty.");
      }

      if(empty($_POST['password'])){
         throw new Exception("Password can't be empty.");
      }
      if(empty($_POST['phone'])){
        throw new Exception("Password can't be empty.");
     }
      $user="SELECT * FROM signupinfo where phoneno = '$_POST[phone]'";
      $query=mysqli_query($conn,$user);
      
      if(mysqli_num_rows($query) == 0){
       echo "<script>alert('Phone Number Does Not Exist')</script>";
      }
        else{
        $sql="UPDATE signupinfo SET username = '$_POST[username]', password = '$_POST[password]' WHERE phoneno = '$_POST[phone]'";
        $result = mysqli_query($conn,$sql);

        if(!$result){
          echo "ERROR: Could not able to execute $sql. " . mysql_error($conn); 
        }
        $success_msg="<script>alert('Updated Successfully')</script>";
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
    <title>Recipe-Sharing-Community</title>
    <!--Landing CSS-->
    <link rel="stylesheet" href="CSS/profile.css" />
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

    <a
      href="logout.php"
      style="
        padding: 10px;
        text-decoration: none;
        justify-content: end;
        display: flex;
      "
    >
      <h1 id="logoutuser">
        <i class="fa-solid fa-power-off"></i>
        Logout
      </h1>
    </a>
    <form action="" method="post">
    <div class="update">
      <button
        style="
          padding: 10px;
          font-size: 20px;
          border-radius: 10px;
          background-color: blue;
          border: none;
          color: whitesmoke;
          cursor: pointer;
        "
        name="update">
        Update Profile
      </button>
    </div>
    <div class="profile">
      <div class="usericon">
        <h1 style="font-size: 200px">
          <i class="fa-solid fa-user" id="user"></i>
        </h1>
      </div>
      <div class="username">
        <h2>Name</h2>
        <input type="text" placeholder="Enter Your Name" name="username" required/>
      </div>
      <div class="userpassword">
        <h2>Password</h2>
        <input type="password" placeholder="Enter Password" name="password" required/>
      </div>
      <div class="phone">
        <h2>Phone</h2>
        <input type="number" placeholder="Enter Number" name="phone" required/>
      </div>
    </div>
    </form>
    <a
      href="landing.html"
      style="
        padding: 40px;
        text-decoration: none;
        justify-content: space-around;
        display: flex;"
    >
      <p id="logoutuser" style="color: black; font-size: 20px">
        <i class="fa-solid fa-arrow-left-long"></i>
        Back to home
      </p>
    </a>
  </body>
</html>
