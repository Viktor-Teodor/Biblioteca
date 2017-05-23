<!-- Modal -->
<div class="modal fade" id="del_reader" tabindex="-1" role="dialog" aria-labelledby="del_readerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="del_readerLabel">Sterge o carte</h4>
      </div>
      <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <input type="hidden" name="type" value="delreader" id="delreader">
                        <input class="form-control" name="nr_matricol" placeholder="Selectati inregistrarea pe care doriti sa o stergeti, prin numarul matricol al elevului" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="delreader" value="Sterge">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_REQUEST['delreader'])){
  $nr_matricol=htmlspecialchars($_POST['nr_matricol']);
  if($conn->query("DELETE FROM elev WHERE nr_matricol='$nr_matricol'"))
    $success=1;
    echo '<script type="text/javascript">
    window.location = "index.php"
    </script>';
  }

}

 ?>
