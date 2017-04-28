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
  die("Connection failed: " . $conn->error);
}
echo "Connected successfully";

// tabela cu elevi
$sql="CREATE TABLE elev(
 nr_matricol VARCHAR(7) NOT NULL,
 nume VARCHAR(20) NOT NULL,
 prenume VARCHAR(30) NOT NULL,
 clasa VARCHAR(5) NOT NULL,
 telefon VARCHAR(15) NOT NULL UNIQUE,
 PRIMARY KEY(nr_matricol),
 email VARCHAR(30) NOT NULL UNIQUE
)";


if($conn->query($sql))
  echo "TABLE elev CREATED";
else
  echo "something went wrong: ".$conn->error;
echo '<br>';

// tabela cartilor
$sql="CREATE TABLE carte(
  nr_inv INT(10) NOT NULL AUTO_INCREMENT,
  titlu VARCHAR(40) NOT NULL,
  autor VARCHAR(30) NOT NULL,
  pret INT(4) NOT NULL,
  volum int(3),
  disponibilitate int(1),
  editura VARCHAR(30),
  categorie VARCHAR(30),
  PRIMARY KEY (nr_inv)
)";

if($conn->query($sql))
  echo "OK";
else
  echo "Error: ". $conn->error;
echo"<br>";

// tabela cu mentiuni
$sql="CREATE TABLE mentiune(
  nr_inv_cae INT(10) NOT NULL,
  id INT (5) NOT NULL,
  continut TINYTEXT,
  FOREIGN KEY (nr_inv_cae) REFERENCES carte(nr_inv)
)";

if($conn->query($sql))
  echo "TABLE mentiune created";
else
  echo "something went wrong: ".$conn->error;
echo '<br>';

// tabela imprumuturilor
$sql="CREATE TABLE imprumut(
  id INT(5) NOT NULL AUTO_INCREMENT,
  data_imprumut TIMESTAMP NOT NULL,
  data_restituire TIMESTAMP,
  intarziat INT(2),
  suma_restanta INT (5),
  nr_matr VARCHAR(7) NOT NULL,
  id_carte INT (10) NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY (nr_matr) REFERENCES elev(nr_matricol),
  FOREIGN KEY (id_carte) REFERENCES carte(nr_inv)
)";

if($conn->query($sql))
  echo "TABLE imprumut CREATED";
else
  echo "something went wrong: ".$conn->error;
echo '<br>';


?>
