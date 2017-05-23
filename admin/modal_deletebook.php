<!-- Modal -->
<div class="modal fade" id="delete_book" tabindex="-1" role="dialog" aria-labelledby="delete_bookLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delete_bookLabel">Sterge o carte</h4>
      </div>
      <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <input type="hidden" name="type" value="delbook" id="delbook">
                        <input class="form-control" name="nr_inv" placeholder="Selectati cartea pe care doriti sa o stergeti, prin numarul de inventar" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='' data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="delbook" value="Sterge">
      </form>
      </div>
    </div>
  </div>
</div>


<?php

$conn=new mysqli("localhost","root","","biblioteca");

if ($_SERVER["REQUEST_METHOD"] == "POST") {


if(isset($_REQUEST['delbook'])){
  $GLOBALS['OK']=0;
  
  $nr_inv=htmlspecialchars($_POST['nr_inv']);
  if($conn->query("DELETE FROM carte WHERE nr_inv='$nr_inv'"))
    $success=1;
    echo '<script type="text/javascript">
   window.location = "index.php"
</script>';
  }

}

 ?>
