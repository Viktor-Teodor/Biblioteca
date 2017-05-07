<?php

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$titlu=htmlspecialchars($_REQUEST['titlu']); if($titlu==NULL) $titlu="%";
$autor=htmlspecialchars($_REQUEST['autor']); if($autor==NULL) $autor="%";
$editura=htmlspecialchars($_REQUEST['editura']); if($editura==NULL) $editura="%";
$categorie=htmlspecialchars($_REQUEST['categorie']); if($categorie=="Toate cartile") $categorie="%";

  if(isset($_POST['cauta'])){
    $sql="SELECT * FROM carte WHERE titlu='$titlu' AND autor='$autor' AND editura='$editura' AND categorie='$categorie'";

    $rez=$conn->query($sql);

  }
}
?>
