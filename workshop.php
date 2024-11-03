<?php

include('connect.php');

try{
    
    if(isset($_POST['submit'])){

      if(empty($_POST['name'])){
         throw new Exception("Name can't be empty.");
      }

      if(empty($_POST['city'])){
         throw new Exception("City can't be empty.");
      }

      if(empty($_POST['date'])){
        throw new Exception("Date can't be empty.");
      }

      if(empty($_POST['time'])){
        throw new Exception("Time can't be empty.");
      }

      if(empty($_POST['phoneno'])){
        throw new Exception("PhoneNo can't be empty.");
      }
        $user="SELECT * FROM workshopbookings where phoneno = '$_POST[phoneno]'";
        $query1=mysqli_query($conn,$user);
        if(mysqli_num_rows($query1) > 0){
          echo "<script>alert('Your Slot is Already Booked!')</script>";
        }
        else{
        $sql="INSERT INTO workshopbookings(name,city,dateOfBooking,timeOfBooking,phoneno) VALUES('$_POST[name]','$_POST[city]','$_POST[date]','$_POST[time]','$_POST[phoneno]')";
        $result = mysqli_query($conn,$sql);

        if(!$result){
          echo "ERROR: Could not able to execute $sql. " . mysql_error($conn); 
        }
        $success_msg="<script>alert('Your Slot is Booked Successfully!')</script>";
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
    <link rel="stylesheet" href="CSS/workshop.css"/>
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

    <!--Navbar Section-->
    <nav class="navbarsection">
      <h1>The Cookbook Corner <i class="fa-solid fa-fire-burner"></i></h1>
      <ul>
        <li><a href="landing.html">Home</a></li>
        <li><a href="landing.html#foodcollection">Recipes</a></li>
        <li><a href="#aboutus">About</a></li>
      </ul>
      <h1>
        <!--Navbar Line Bars Section-->
        <i class="fa-solid fa-bars" id="linebars"></i>
        <a href="profile.php">
          <i class="fa-solid fa-user" id="user"></i>
        </a>
      </h1>
    </nav>
    <!--Side Navbar Section-->
    <nav class="sidenavbarsection">
      <ul>
        <li id="sidehome"><a href="landing.html">Home</a></li>
        <li id="sidefood"><a href="landing.html#foodcollection">Recipes</a></li>
        <li id="sideabout"><a href="#aboutus">About</a></li>
      </ul>
      <div class="xmark">
        <i class="fa-solid fa-xmark"></i>
      </div>
    </nav>
    <!--Workshoptitle Section-->
    <div class="workshoptitle">
      <p
        style="
          font-size: 45px;
          text-shadow: 2px 2px 2px black;
          padding-bottom: 10px;
        "
      >
        "Master the Art of Cooking – Join Our
        <strong style="color: #f17816; font-size: 55px">Workshop</strong> !"
      </p>
      <p style="font-size: 35px; padding-bottom: 10px">
        One-day session focusing on mastering traditional cooking methods.
      </p>
      <p style="font-size: 35px; padding-bottom: 10px">
        Emphasize limited availability to encourage quick registration.
      </p>
    </div>
    <hr style="margin-left: 20%; margin-right: 20%" />

    <!--Book Appointment Section-->
    <div class="book" style="padding: 20px; text-align: center">
      <a
        href="#bookform1"
        style="
          font-size: 55px;
          text-decoration: none;
          color: blue;
          text-shadow: 3px 3px 3px black;
        "
        ><strong>Book Your Appointment</strong></a
      >
    </div>

    <!--Booking Form Section-->
    <div class="bookform" id="bookform1">
      <div class="inputdetails">
      <form method="post">
        <p>Enter Your Name</p>
        <input type="text" name="name" placeholder="Name" required />
        <p>Select City</p>
        <select name="city" id="city" required>
          <option name="" selected hidden>--Select City--</option>
          <option value="Chennai">Chennai</option>
          <option value="Kancheepuram">Kancheepuram</option>
          <option value="Chengalpattu">Chengalpattu</option>
        </select>
        <p>Enter Your Number</p>
        <input type="number" name="phoneno" placeholder="Phone No" required />
        <p>Select Date and Time</p>
        <input type="date" name="date" required/> <input type="time" name="time" required/>
        <p style="color: red">(Note: Workshop hours are 10am to 4pm)</p>
        <button type="submit" name="submit">Submit</button><br>
      </form>
      <form action="" method="post">
        <p>Enter Number To Check Booking Status</p>
        <input type="number" name="phoneno" placeholder="Phone No" required />
        <button type="submit" name="check">Check Status</button>
      </form>
    <?php
      if(isset($_POST['check'])){
        if(empty($_POST['phoneno'])){
          throw new Exception("PhoneNo can't be empty.");
        }
        $check="SELECT name,city,dateOfBooking,timeOfBooking,phoneno FROM workshopbookings where phoneno = '$_POST[phoneno]'";
        $query2=mysqli_query($conn,$check);
        $numrows=mysqli_num_rows($query2);
        if($numrows == 0){
          echo "Not Booked Yet!";
        }
        else{
          while($row = mysqli_fetch_assoc($query2)){
          echo'Booking Confirmation!';
          echo '<table>';
          echo '<tr>';
          echo '<td>Name</td>';
          echo '<td>-</td>';
          echo '<td>'.$row['name'].'</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>City</td>';
          echo '<td>-</td>';
          echo '<td>'.$row['city'].'</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>Date</td>';
          echo '<td>-</td>';
          echo '<td>'.$row['dateOfBooking'].'</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>Time</td>';
          echo '<td>-</td>';
          echo '<td>'.$row['timeOfBooking'].'</td>';
          echo '</tr>';
          echo '<tr>';
          echo '<td>Phone</td>';
          echo '<td>-</td>';
          echo '<td>'.$row['phoneno'].'</td>';
          echo '</tr>';
          echo '</table>';
          }
        }
      }
    ?>
      </div>
      <div class="inputdetails">
        <img
          src="https://img.freepik.com/premium-photo/father-son-cooking-together_1267997-4612.jpg?ga=GA1.1.943950442.1728618274&semt=ais_hybrid"
          alt="Workshop Image"
        />
      </div>
    </div>

    <!--About Section-->
    <div class="about" id="aboutus">
      <p style="font-size: 30px">
        <strong style="font-size: 40px; text-align: center"
          >About Workshop:</strong
        ><br />
        We are a passionate community of food lovers dedicated to sharing
        traditional cooking techniques and recipes. Our goal is to connect
        people through hands-on learning experiences. Whether you're a beginner
        or a seasoned cook, our workshops offer a fun way to explore new skills.
        Join us to learn, cook, and share delicious food with others!
      </p>
    </div>
    <!--Copyright Section-->
    <div class="copyright">
      <h2>The Cookbook Corner <i class="fa-solid fa-fire-burner"></i></h2>
      <p>Home Cooks</p>
      <hr />
      <p style="padding-top: 10px">
        <i class="fa-regular fa-copyright"></i> 2024 The Cookbook Corner. All
        Rights Reserved.
      </p>
    </div>
    <!--JavaScript Link-->
    <script src="../JS/workshop.js"></script>
  </body>
</html>
