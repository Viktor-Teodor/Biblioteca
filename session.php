<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM elev where nr_matricol = '2002'";
$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row_log = mysqli_fetch_assoc($result);
        if($row_log['nr_matricol']!=2002)
          header("location: ../");
}
?>
