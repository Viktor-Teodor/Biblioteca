<!-- Modal -->
<div class="modal fade" id="mod_books" tabindex="-1" role="dialog" aria-labelledby="mod_booksLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mod_bookLabel">Modifica o carte</h4>
      </div>
      <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <input type="hidden" name="type" value="modbook" id="modbook">
                        <input class="form-control" name="nr_inv" placeholder="Selectati cartea pe care doriti sa o modificati, prin numarul de inventar" required>
                        <br>
                        <br>
                        <p> introduceti doar valorile care doriti sa fie modificate</p>
                        <input class="form-control" type="text" name="titlu" placeholder="Titlu nou" >
                        <input class="form-control" type="text" name="autor" placeholder="Autor nou" >
                        <br>
                        <input class="form-control" type="text" name="pret" placeholder="Pretul nou al cartii">
                        <input class="form-control" type="text" name="volum" placeholder="Numarul volumului">
                        <br>
                        <input class="form-control" type="text" name="categorie" placeholder="Categoria noua">
                        <input class="form-control" type="text" name="editura" placeholder="Editura noua">
                        <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="modbook" value="Modifica">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field

    $results=array();
    $ceva=array();

if(isset($_POST['modbook'])){
  $GLOBALS['OK']=0;

      $titlu=htmlspecialchars($_REQUEST['titlu']);
      $autor=htmlspecialchars($_REQUEST['autor']);
      $volum=htmlspecialchars($_REQUEST['volum']);
      $editura=htmlspecialchars($_REQUEST['editura']);
  $nr_inventar= htmlspecialchars($_REQUEST['nr_inv']);
    $categorie=htmlspecialchars($_REQUEST['categorie']);
    $pret=htmlspecialchars($_REQUEST['pret']);
    $sql="SELECT * FROM carte WHERE nr_inv='$nr_inventar'";
    $results=$conn->query($sql);

    if($results->num_rows>0){
        $ceva=$results->fetch_assoc();
        if($titlu==NULL)
          $titlu=$ceva['titlu'];
        if($autor==NULL)
          $autor=$ceva['autor'];
        if($pret==NULL)
          $pret=$ceva['pret'];
        if($volum==NULL)
          $volum=$ceva['volum'];
        if($volum==0)
          $volum=NULL;
        if($categorie==NULL)
          $categorie=$ceva['categorie'];
        if($categorie==0)
          $categorie-NULL;
        if($editura==NULL)
          $editura=$ceva['editura'];

        $sql="UPDATE carte SET titlu='$titlu', autor='$autor', pret='$pret', volum='$volum', categorie='$categorie', editura='$editura' WHERE nr_inv='$nr_inventar'";
        if($conn->query($sql))
          echo "Carte modificata cu succes";
        else {
          echo "eroare:".$conn->error;
        }

        }
    else
      echo "Nu exista aceasta carte in inregistrari";
      echo '<script type="text/javascript">
     window.location = "index.php"
</script>';
    }



}

 ?>
