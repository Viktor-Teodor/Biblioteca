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


if($conn->query($sql))
  echo "TABLE elev CREATED";
else
  echo "something went wrong";
echo '<br>';



// tabela cu editurile



$sql="CREATE TABLE editura(
id INT(6),
  nume VARCHAR(20) NOT NULL,
  oras VARCHAR(15) NOT NULL,
  nr_inv_cae INT(10) NOT NULL,
  AUTO_INCREMENT PRIMARY KEY(id)
)";

if($conn->query($sql))
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

//tabela cu mentiuni


$sql="CREATE TABLE mentiune(
  nr_inv_cae INT(10) NOT NULL,
  id INT (5) NOT NULL,
  continut TINYTEXT,
  FOREIGN KEY (nr_inv_cae) REFERENCES carte(id)
)";


if($conn->query($sql))
  echo "TABLE mentiune created";
else
  echo "something went wrong";
echo '<br>';

// tabela imprumuturilor

$sql="CREATE TABLE imprumut(
  id INT(5) AUTOINCREMENT PRIMARY KEY,
  data_imprumut DATE() NOT NULL,
  data_restituire DATE(),
  nr_matr VARCHAR(7) NOT NULL,
  FOREIGN KEY (nr_matr) REFERENCES elev(nr_matricol) 
)";


if($conn->query($sql))
  echo "TABLE imprumut CREATED";
else
  echo "something went wrong";
echo '<br>';

$sql="CREATE TABLE instanta(
    id INT (5) AUTOINCREMENT PRIMARY KEY,
    id_imp INT(5) NOT NULL,
    id_inv_cae INT(5) NOT NULL,
    FOREIGN KEY (id_imp) REFERENCES imprumut(id),
    FOREIGN KEY (id_inv_car) REFERENCES carte(nr_inv)
)";


?>
