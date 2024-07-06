<?php
require 'shanthi_mail';
if (isset($_POST['sub'])){
$servername = "localhost";
$dbname = "Shaanthi_form";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $message = $_POST['message'];

 
  $stmt = $conn->prepare("INSERT INTO your_table_name (first_name, last_name, email, mobile, message) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $fname, $lname, $email, $mobile, $message);

  
  if ($stmt->execute()) {
    echo "<script>alert('Application Submitted Successfully')</script>";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
}
?>