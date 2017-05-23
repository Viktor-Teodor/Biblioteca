<!-- Modal -->
<div class="modal fade" id="mod_readers" tabindex="-1" role="dialog" aria-labelledby="mod_readersLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mod_readersLabel">Modifica o carte</h4>
      </div>
      <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                      <input type="hidden" name="type" value="modreaders" id="modreaders">
                        <input class="form-control" name="nr_matricol" placeholder="Selectati elevul pe care doriti sa il modificati, prin numarul matricol" required>
                        <br>
                        <br>
                        <p> introduceti doar valorile care doriti sa fie modificate</p>
                        <input class="form-control" type="text" name="nume" placeholder="Nume" >
                        <input class="form-control" type="text" name="prenume" placeholder="Prenume" >
                        <br>
                        <input class="form-control" type="text" name="clasa" placeholder="Clasa" >
                        <input class="form-control" type="text" name="telefon" placeholder="Telefon" >
                        <br>
                        <input class="form-control" type="text" name="email" placeholder="Email" >

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

      $nume=htmlspecialchars($_REQUEST['nume']);
      $prenume=htmlspecialchars($_REQUEST['prenume']);
      $clasa=htmlspecialchars($_REQUEST['clasa']);
      $telefon=htmlspecialchars($_REQUEST['telefon']);
      $email= htmlspecialchars($_REQUEST['email']);
      $nr_matricol= htmlspecialchars($_REQUEST['nr_matricol']);

    $sql="SELECT * FROM elev WHERE nr_matricol='$nr_matricol'";
    $results=$conn->query($sql);

    if($results->num_rows>0){
        $ceva=$results->fetch_assoc();
        if($nume==NULL)
          $nume=$ceva['nume'];
        if($prenume==NULL)
          $prenume=$ceva['prenume'];
        if($clasa==NULL)
          $clasa=$ceva['clasa'];
        if($telefon==NULL)
          $telefon=$ceva['telefon'];
        if($email==NULL)
          $email=$ceva['email'];

        $sql="UPDATE elev SET nume='$nume', prenume='$prenume', clasa='$clasa', telefon='$telefon', email='$email' WHERE nr_matricol='$nr_matricol'";
        if($conn->query($sql))
          echo "Inregistrare modificata cu succes";
        else {
          echo "eroare:".$conn->error;
        }

        }
    else
      echo "Nu exista acest elev in inregistrari";
      echo '<script type="text/javascript">
     window.location = "index.php"
</script>';
    }
}

 ?>
