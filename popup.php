<?php
include_once "session.php";
if(isset($_POST['add']))
  {
    $sql = "INSERT INTO elev (nr_matricol, nume, prenume, clasa, telefon, email)
            VALUES ('$_POST[nr_matricol]', '$_POST[nume]', '$_POST[prenume]','$_POST[clasa]', '$_POST[telefon]', '$_POST[email]')";

if (!mysqli_query($conn, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
  }
$_GET['serie']+=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Biblioteca LTDC</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
<br>
  <div class="col-lg-4">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Elevul cu numarul <?php echo $_GET['serie'] ?></h3>
          </div>
          <div class="panel-body">
                <form method="post" action="popup.php?<?php echo 'serie='.$_GET['serie'].'&'.'clasa='.$_GET['clasa'].'&'.'s_nr_mat='.$_GET['s_nr_mat'] ?>">
                  <div class="form-group">
                      <input name="nume" class="form-control" placeholder="Nume" required>
                  </div>
                  <div class="form-group">
                    <input name="prenume" class="form-control" placeholder="Prenume" required>
                  </div>
                  <div class="form-group">
                    <input name="telefon" class="form-control" placeholder="Telefon" required>
                  </div>
                  <div class="form-group">
                    <input name="email" class="form-control" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="nr_matricol" value="<?php echo $_GET['s_nr_mat']."/".$_GET['serie']?>">
                    <input type="hidden" name="clasa" value="<?php echo $_GET['clasa']?>">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-default" name="add" value="Adauga">
                  </div>
                </form>
              </div>
          </div>
  </div>


  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!-- Morris Charts JavaScript -->
  <script src="js/plugins/morris/raphael.min.js"></script>
  <script src="js/plugins/morris/morris.min.js"></script>
  <script src="js/plugins/morris/morris-data.js"></script>
  <script src="footer.js"></script>


</body>

</html>
