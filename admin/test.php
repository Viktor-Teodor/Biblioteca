<!DOCTYPE html>
<html>
<body>

<?php
$conn=mysqli_connect("localhost","root","","biblioteca");

      $res_rec=0;
    if(isset($_POST['restituire'])){
      if($_POST['nr_mat'] != "Numar matricol"){
        $sql = "SELECT DATEDIFF (CURDATE(), data_imp) FROM imprumut WHERE DATEDIFF (CURDATE(), data_imp) > 14 AND id_elev='$_POST[nr_mat]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
        $result = mysqli_query($conn, $sql);
        $restanta = mysqli_fetch_assoc($result);
        
        $sql = "UPDATE imprumut SET data_res=CURDATE()
                WHERE id_elev='$_POST[nr_mat]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";

      if (mysqli_query($conn, $sql)) {
        $res_rec=1;
    }
    }
    else {
    $sql = "SELECT nr_matricol FROM elev WHERE nume='$_POST[nume]' AND prenume='$_POST[prenume]' AND clasa='$_POST[clasa]'";
    $result = mysqli_query($conn, $sql);
    $user_imp = mysqli_fetch_assoc($result);
    $sql = "UPDATE imprumut SET data_res=CURDATE()
            WHERE id_elev='$user_imp[nr_matricol]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
      if (mysqli_query($conn, $sql)) {
        $res_rec=1;
    }
    $sql = "SELECT DATEDIFF (CURDATE(), data_imp) FROM imprumut WHERE DATEDIFF (CURDATE(), data_imp) > 14 AND id_elev='$user_imp[nr_matricol]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
    $result = mysqli_query($conn, $sql);
    $restanta = mysqli_fetch_assoc($result);
    }
    }
    echo $restanta['DATEDIFF (CURDATE(), data_imp)']. "    ". $res_rec;
?>

<form method="post">
  <div class="form-group">
      <input name="nr_inv" class="form-control" placeholder="Numar inventar carte" required>
  </div>
  <div class="form-group">
    <input name="nr_mat" value="Numar matricol" class="form-control" placeholder="Numar matricol elev">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-default" name="restituire" value="Trimite">
  </div>
</form>

</body>
</html>
