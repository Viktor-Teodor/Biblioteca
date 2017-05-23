<!-- Modal -->

<div class="modal fade" id="find_readers" tabindex="-1" role="dialog" aria-labelledby="find_readersLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="find_readersLabel">Gaseste elevi</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <div class="form-group">
              <input name="nr_matricol" class="form-control" placeholder="Numarul matricol al elevului">
          </div>
          <div class="form-group">
              <input name="nume" class="form-control" placeholder="Nume">
          </div>
          <div class="form-group">
              <input name="prenume" class="form-control" placeholder="Prenume">
          </div>
          <div class="form-group">
            <input name="clasa" class="form-control" placeholder="Clasa">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="findbook" value="Gaseste">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

//include_once "session.php";

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if(isset($_POST['findbook'])){
    $nr_matricol=htmlspecialchars($_REQUEST['nr_matricol']); if($nr_matricol==NULL) $nr_matricol='%';
    $nume=htmlspecialchars($_REQUEST['nume']); if($nume==NULL) $nume='%';
    $prenume=htmlspecialchars($_REQUEST['prenume']); if($prenume==NULL) $prenume='%';
    $clasa=htmlspecialchars($_REQUEST['clasa']); if($clasa==NULL) $clasa='%';

    $_SESSION['query_de_elevi']="SELECT * FROM elev WHERE nr_matricol LIKE '$nr_matricol' AND nume LIKE '$nume' AND prenume LIKE '$prenume' AND clasa LIKE '$clasa'";

 echo '<script type="text/javascript">
 window.location = "rezultate2.php"
 </script>';
}}


?>
