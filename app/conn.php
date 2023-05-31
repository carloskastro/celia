<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mase";
$msg1=null;
$msg2=null;

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $msg1="<i class='bi bi-check-circle'></i> Connected OK";
} catch(PDOException $e) {
  $msg2="<i class='bi bi-x-circle'></i> Connection failed: " . $e->getMessage();
}
?>