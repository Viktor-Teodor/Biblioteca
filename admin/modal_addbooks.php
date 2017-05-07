<!-- Modal -->
<div class="modal fade" id="add_books" tabindex="-1" role="dialog" aria-labelledby="add_bookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="add_bookLabel">Adauga o carte</h4>
      </div>
      <div class="modal-body">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> " >
                      <input type="hidden" name="type" value="addbook" id="addbook">
                        <input class="form-control" name="nr_inv" placeholder="Numar de inventar" required>
                        <input class="form-control" type="text" name="titlu" placeholder="Titlu" required>
                        <br>
                        <input class="form-control" type="text" name="autor" placeholder="Autor" required>
                        <input class="form-control" type="text" name="pret" placeholder="Pretul cartii" required>
                        <br>
                        <input class="form-control" type="text" name="volum" placeholder="Numarul volumului">
                        <input class="form-control" type="text" name="categorie" placeholder="Categorie">
                        <br>
                        <input class="form-control" type="text" name="editura" placeholder="Editura" required>
                        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class=" btn btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="addbook" value="Adauga">
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
if(isset($_POST['addbook'])){
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

echo'<script>
<!--
location.replace("index.php");
-->
</script>
';
}
 ?>
