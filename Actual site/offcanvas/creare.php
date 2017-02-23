<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name= "Biblioteca";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql="CREATE DATABASE Biblioteca";
if($conn->query($sql))
  echo "Database created successfully";
else
  echo "Error:".$conn->connect_error;
echo "<br>";

$conn= new mysqli($servername, $username, $password, $db_name);
if($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// tabela cu elevi


$sql="CREATE TABLE elev(
 nr_matricol VARCHAR(7) NOT NULL PRIMARY KEY,
 nume VARCHAR(20) NOT NULL,
 prenume VARCHAR(30) NOT NULL,
 clasa VARCHAR(5) NOT NULL,
 telefon VARCHAR(15) NOT NULL UNIQUE,
 email VARCHAR(30) NOT NULL UNIQUE
)";


if(mysqli_query($conn,$sql))
  echo "TABLE elev CREATED";
else
  echo "something went wrong";
echo '<br>';



// tabela cu editurile



$sql="CREATE TABLE editura(
id INT(6),
  nume VARCHAR(20) NOT NULL,
  oras VARCHAR(15) NOT NULL,
  AUTO_INCREMENT PRIMARY KEY(id)
)";

if(mysqli_query($conn,$sql))
  echo "TABLE editura created";
else
  echo "something went wrong";
echo '<br>';



// tabela cartilor


$sql="CREATE TABLE carte(
  nr_inv INT(10) NOT NULL PRIMARY KEY,
  titlu VARCHAR(40) NOT NULL,
  autor VARCHAR(30) NOT NULL,
  pret INT(4) NOT NULL,
  volum int(3),
  disponibilitate int(1),
  id_eda INT(6),
  categorie VARCHAR(10),
  FOREIGN KEY (id_eda) REFERENCES editura(id)
)";


if($conn->query($sql))
  echo "OK";
else
  echo "Error: ". $conn->connect_error;
echo"<br>";







// tabela imprumuturilor



$sql="CREATE TABLE imprumut(
  data_imprumut DATE() NOT NULL,
  data_restituire DATE(),
  nr_matricol_elv VARCHAR(7) NOT NULL,
  nr_inv_cae INT(10) NOT NULL,
  FOREIGN KEY (nr_matricol_elv) REFERENCES elev,
  FOREIGN KEY (nr_inv_cae) REFERENCES carte
)";


if(mysqli_query($conn,$sql))
  echo "TABLE imprumut CREATED";
else
  echo "something went wrong";
echo '<br>';


// tabela imprumuturilor



$sql="CREATE TABLE mentiune(
  nr_inv_cae INT(10) NOT NULL,
  id INT (5) NOT NULL,
  continut TINYTEXT
)";


if(mysqli_query($conn,$sql))
  echo "TABLE mentiune created";
else
  echo "something went wrong";
echo '<br>';

?>
