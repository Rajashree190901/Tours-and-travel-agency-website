<?php

$name = $_POST['name'];
$email  = $_POST['email'];
$passworda = $_POST['passworda'];
$passwordb = $_POST['passwordb'];
print_r($_POST);
echo $username;
echo $passworda;


if (!empty($name) || !empty($email) || !empty($passworda) || !empty($passwordb) )
{

$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From login Where email = ? Limit 1";
  $INSERT = "INSERT Into login(name , email , passworda ,passwordb )values(?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $name,$email,$passworda,$passwordb);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>