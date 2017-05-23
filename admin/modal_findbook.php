<!-- Modal -->

<div class="modal fade" id="find_book" tabindex="-1" role="dialog" aria-labelledby="find_bookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="find_bookLabel">Gaseste carti</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <div class="form-group">
              <input name="titlu" class="form-control" placeholder="Titlul cartii">
          </div>
          <div class="form-group">
              <input name="volum" class="form-control" placeholder="Volumul cartii">
          </div>
          <div class="form-group">
              <input name="autor" class="form-control" placeholder="Autorul cartii">
          </div>
          <div class="form-group">
            <input name="editura" class="form-control" placeholder="Editura">
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

$OK=1;

//  $categorie=htmlspecialchars($_REQUEST['categorie']); if($categorie=="Toate cartile") $categorie="%";
$categorie='%';
  if(isset($_POST['findbook'])){
    $titlu=htmlspecialchars($_REQUEST['titlu']); if($titlu==NULL) $titlu='%';
    $autor=htmlspecialchars($_REQUEST['autor']); if($autor==NULL) $autor='%';
    $editura=htmlspecialchars($_REQUEST['editura']); if($editura==NULL) $editura='%';
    $volum=htmlspecialchars($_REQUEST['volum']); if($volum==NULL) $volum='%';

    $_SESSION['query_de_carti']="SELECT * FROM carte WHERE titlu LIKE '$titlu' AND autor LIKE '$autor' AND volum LIKE '$volum' AND editura LIKE '$editura' AND categorie LIKE '$categorie'";

 echo '<script type="text/javascript">
 window.location = "rezultate.php"
 </script>';
}}


?>
