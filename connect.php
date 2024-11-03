<?php
$host='localhost'; $username='root';
$password=''; $dbname = "recipesharingcommunity"; 
$conn=mysqli_connect($host,$username,$password,$dbname); 
if(!$conn) 
{ 
    die('Could not Connect MySQL Server:' .mysql_error());
} 
?>