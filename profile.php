<?php
include_once 'session.php';
include_once 'function.php';

if($_POST['nr_matricol'] !=0){
  $sql = "SELECT * FROM elev where nr_matricol = '$_POST[nr_matricol]'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1)
    $uf = 1;
  else
    $uf = 0;
    }
    else {
      $sql = "SELECT * FROM elev WHERE nume='$_POST[nume]' AND prenume='$_POST[prenume]' AND clasa='$_POST[clasa]'";
      }
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1){
          $user = mysqli_fetch_assoc($result);
        }
        else{
          $error="User-ul nu a fost gasit";
        }
//modificam un user
  if(isset($_POST['save'])){
    $sql = "UPDATE elev SET nr_matricol='$_POST[nr_matricol]', nume='$_POST[nume]', prenume='$_POST[prenume]', email='$_POST[email]' WHERE nr_matricol='$user[nr_matricol]'";

  if (mysqli_query($conn, $sql)) {
      $update = 1;
  } else {
      $update = 0;
  }
  $sql = "SELECT * FROM elev where nr_matricol = '$_POST[nr_matricol]'";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);

  }
  if(isset($_POST['delete']) && $_POST['delete'] == "Sterge"){
    $sql = "INSERT INTO elev_sters SELECT * FROM elev where nr_matricol = '$user[nr_matricol]'";
    $result1 = mysqli_query($conn, $sql);
    $sql = "DELETE FROM elev WHERE nr_matricol = '$user[nr_matricol]'";
    $result2 = mysqli_query($conn, $sql);
    header("location: cititorii.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $user['nume']." ".$user['prenume']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <?php include_once "menu_top.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include_once 'menu.php'; ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h2 class="page-header">
                          Profil: <small><?php echo $user['nume'] . " " . $user['prenume']; ?></small>
                      </h2>
                  </div>
              </div>
                <!-- Page Heading -->
                <?php if(isset($update) && $update == 1){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Succes</strong> Datele au fost modificare cu succes ! :))
                        </div>
                    </div>
                </div>
                <?php } if(isset($update) && $update == 0){ ?>
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="fa fa-info-circle"></i>  <strong>Upss !</strong> Ceva nu a functionat corect ! :)) <?php echo mysqli_error($conn); ?>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
                  <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="glyphicon glyphicon-user fa-fw"></i> Detalii</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <tbody>
                                          <?php if($_GET['type']=="edit") {?>
                                          <form method="post">
                                            <tr>
                                                <td>Numar matricol</td>
                                                <td><input type="text" class="form-control" name="nr_matricol" value="<?php echo $user['nr_matricol'] ?>" ></td>
                                            </tr>
                                            <tr>
                                                <td>Nume</td>
                                                <td><input type="text" class="form-control" name="nume" value="<?php echo $user['nume'] ?>" ></td>
                                            </tr>
                                            <tr>
                                                <td>Prenume</td>
                                                <td><input type="text" class="form-control" name="prenume" value="<?php echo $user['prenume'] ?>" ></td>
                                            </tr>
                                            <tr>
                                                <td>Telefon</td>
                                                <td><input type="text" class="form-control" name="telefon" value="<?php echo $user['telefon'] ?>" ></td>
                                            </tr>
                                            <tr>
                                                <td>Telefon</td>
                                                <td><input type="text" class="form-control" name="email" value="<?php echo $user['email'] ?>" ></td>
                                            </tr>
                                            <?php } else if($_GET['type'] == "search" || $_GET['type'] == "delete" ) {?>
                                              <tr>
                                                  <td>Numar mat</td>
                                                  <td><?php echo $user['nr_matricol'] ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Nume</td>
                                                  <td><?php echo $user['nume'] ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Prenume</td>
                                                  <td><?php echo $user['prenume'] ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Telefon</td>
                                                  <td><?php echo $user['telefon'] ?></td>
                                              </tr>
                                              <tr>
                                                  <td>Telefon</td>
                                                  <td><?php echo $user['email'] ?></td>
                                              </tr>
                                              <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <?php if($_GET['type'] == "edit"){?><form method="post"><input type="submit" name="save" class="button" value="Save"></form><?php } ?>
                                    <?php if($_GET['type'] == "delete"){?>
                                      <form method="post">
                                        <input type="hidden" name="nr_matricol" class="button" value="<?php echo $_POST['nr_matricol']?>">
                                        <input type="submit" name="delete" class="button" value="Sterge">
                                      </form>
                                      <?php } ?>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>


</body>

</html>
