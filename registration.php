 <?php

$email = $_POST['email'];
$whereto = $_POST['whereto'];
$howmany = $_POST['howmany'];
$adate = $_POST['adate'];
$ldate = $_POST['ldate'];
 


if (!empty($email) || !empty($whereto) || !empty($howmany) || !empty($adate) || !empty($ldate) )
{

$host = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "registration";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email From registration Where email = ? Limit 1";
  $INSERT = "INSERT Into registration(email ,whereto, howmany ,adate,ldate)values(?,?,?,?,?)";

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
      $stmt->bind_param("ssiii", $email ,$whereto, $howmany ,$adate,$ldate);
      $stmt->execute();
      echo "BOOKED SUCCESSFULLY";
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