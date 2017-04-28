<!-- Modal -->
<div class="modal fade" id="find_book" tabindex="-1" role="dialog" aria-labelledby="find_bookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="find_bookLabel">Adauga un elev</h4>
      </div>
      <div class="modal-body">
                    <form method="post">
                      <input type="hidden" name="type" value="findbook" id="findbook">
                        <input class="form-control" type="text" name="nr_inv" placeholder="Numar inventar" required>
                        <br>
                        <br>
                        <p> Sau cautati carti dupa alte caracteristici</p>
                        <input class="form-control" type="text" name="prenume" placeholder="Prenume" required>
                        <br>
                        <input class="form-control" type="text" name="nr_matricol" placeholder="Numar matricol" required>
                        <input class="form-control" type="text" name="clasa" placeholder="Clasa" required>
                        <br>
                        <input class="form-control" type="text" name="telefon" placeholder="Telefon" required>
                        <input class="form-control" type="text" name="email" placeholder="Email" required>
                        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn-primary" name="findbook" value="Gaseste">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field

    $nr_inventar= htmlspecialchars($_REQUEST['nr_inv']);
    $titlu=htmlspecialchars($_REQUEST['titlu']);
    $autor=htmlspecialchars($_REQUEST['autor']);
    $pret=htmlspecialchars($_REQUEST['pret']);
    $volum=htmlspecialchars($_REQUEST['volum']);
    $categorie=htmlspecialchars($_REQUEST['categorie']);
    $editura=htmlspecialchars($_REQUEST['editura']);
    $results=array();
    $ceva=array();

if(isset($_POST['findbook'])){
    $sql="SELECT * FROM carte WHERE nr_inv='$nr_inventar'";
    $results=$conn->query($sql);
    if($results->num_rows>0){
      echo "Ati mai introdus acest numar de inventar";
      }
    else{
       $sql = "INSERT INTO carte (nr_inv, titlu, autor, pret, volum, categorie,editura)
            VALUES ('$nr_inventar', '$titlu', '$autor','$pret', '$volum', '$categorie','$editura')";

          if($conn->query($sql))
            echo "success";
          else
            echo $conn->error;
}
}
}
 ?>
