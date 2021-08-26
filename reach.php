<?php

$NAME = $_POST['NAME'];
$EMAIL  = $_POST['EMAIL'];
$NUMBER = $_POST['NUMBER'];
$SUBJECT = $_POST['SUBJECT'];
$MESSAGE = $_POST['MESSAGE'];
 


if (!empty($NAME) || !empty($EMAIL) || !empty($NUMBER) || !empty($SUBJECT) || !empty($MESSAGE) )
{

$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "reach";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From reach Where email = ? Limit 1";
  $INSERT = "INSERT Into reach(NAME,EMAIL, NUMBER ,SUBJECT,MESSAGE )values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $EMAIL);
     $stmt->execute();
     $stmt->bind_result($EMAIL);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssiss", $NAME,$EMAIL,$NUMBER,$SUBJECT,$MESSAGE);
      $stmt->execute();
      echo "NOTED SUCCESSFULLY";
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