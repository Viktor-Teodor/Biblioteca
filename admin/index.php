<?php
include_once 'session.php';
include_once 'classUser.php';
include_once 'function.php';
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

    <?php
    $conn=new mysqli("localhost","root","","biblioteca");

    global $add_rec, $res_rec;
    $add_rec=$res_rec=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $nume = htmlspecialchars($_REQUEST['nume']);
        $prenume=htmlspecialchars($_REQUEST['prenume']);
        $nr_matricol=htmlspecialchars($_REQUEST['nr_mat']);
        $clasa=htmlspecialchars($_REQUEST['clasa']);

        $limita_carti=3;
        $nr;
        $results=array();
        $user_imp=array();
        $restanta=array();
        $rez=array();



    if(isset($_POST['imprumut'])){
      $rezervat=0;
      $titlu=htmlspecialchars($_REQUEST['titlu']);
      $volum=htmlspecialchars($_REQUEST['volum']);

      $sql="SELECT * FROM carte WHERE titlu='$titlu'AND volum='$volum' AND disponibilitate='0'";

      $results=$conn->query($sql);
      $aux=$results->fetch_assoc();
      $nr_inv=$aux['nr_inv'];

      if($results->num_rows==0)
        echo "Nu mai exista carti disponibile";

      else{

    if($nr_matricol){

      $sql="SELECT * FROM imprumut WHERE nr_matr='$nr_matricol' AND data_restituire IS NULL";

      $nr=$conn->query($sql);

      $sql="SELECT * FROM rezervari WHERE nr_matr='$nr_matricol' AND DATEDIFF(CURDATE(),data_rezervare)<=1";
        $rez=$conn->query($sql);

        if($rez->num_rows==1)
          $rezervat=1;

      if($nr->num_rows<$limita_carti){
        if($rezervat==1){

                $rez=$rez->fetch_assoc();

          $sql="INSERT INTO imprumut(nr_matr,data_imprumut,id_carte) VALUES ('$nr_matricol',GETDATE,'$rez[nr_inv]')";
          $conn->query("DELETE FROM rezervari WHERE id='$rez[id]'");
          $conn->query("UPDATE carte SET disponibilitate=-1 WHERE nr_inv='$nr_inv'");
        }
        else
        $sql = "INSERT INTO imprumut (nr_matr, data_imprumut, id_carte)
              VALUES ('$nr_matricol', CURDATE(),'$nr_inv')";

              if ($conn->query($sql)){
                $add_rec=1;
      }
      $sql="UPDATE carte SET disponibilitate='1' WHERE nr_inv='$nr_inv'";
      $conn->query($sql);
    }
    else {
      echo "Acest elev are deja 3 carti imprumutate";
    }

}
    else {

    $sql="SELECT * FROM elev WHERE nume='$nume' AND prenume='$prenume' AND clasa='$clasa'";

    $results =$conn->query($sql);

    if($results->num_rows>0){

    $user_imp=$results->fetch_assoc();

    $results->free();

    $nr_matricol=$user_imp['nr_matricol'];

    $sql="SELECT * FROM imprumut WHERE nr_matr='$nr_matricol' AND data_restituire IS NULL";

    $nr=$conn->query($sql);

          if($nr->num_rows<$limita_carti){

            $sql="SELECT * FROM rezervari WHERE nr_matr='$nr_matricol' AND DATEDIFF(CURDATE(),data_rezervare)<=1";

              $rez=$conn->query($sql);

              if($rez->num_rows==1){

                $rez=$rez->fetch_assoc();
                $sql="INSERT INTO imprumut(nr_matr,data_imprumut,id_carte) VALUES ('$nr_matricol',CURDATE(),'$rez[nr_inv]')";

                $conn->query("DELETE FROM rezervari WHERE id='$rez[id]'");
                $conn->query("UPDATE carte SET disponibilitate=-1 WHERE nr_inv='$nr_inv'");
              }
              else
                $sql = "INSERT INTO imprumut (nr_matr, id_carte, data_imprumut)
                  VALUES ('$user_imp[nr_matricol]', '$nr_inv', CURDATE())";

              if ($conn->query($sql)) {
                        $add_rec=1;
                      }
                      //  $user_imp->free();
                        $sql="UPDATE carte SET disponibilitate='1' WHERE nr_inv='$nr_inv'";
                        $conn->query($sql);
          }
          else
            echo "Acest elev are deja 3 carti imprumutate";
    }
    else {
      echo "Acest elev nu exista";
    }
    }
    }
  }



    //restituire carte
    if(isset($_POST['restituire'])){
      $nr_inv=htmlspecialchars($_REQUEST['nr_inv']);

      if($nr_matricol){

        $sql = "SELECT DATEDIFF (CURDATE(), data_imprumut) AS diferenta, id FROM imprumut WHERE nr_matr='$nr_matricol' AND id_carte='$nr_inv' AND data_restituire IS NULL";

        $results = $conn->query($sql);
        if($results->num_rows==1){


        $restanta = $results->fetch_assoc();

        $sql = "UPDATE imprumut SET data_restituire=CURDATE()
                WHERE nr_matr='$nr_matricol' AND id_carte='$nr_inv' AND data_restituire IS NULL";
                if ($conn->query($sql)) {
                  $res_rec=1;
        }
        $sql="UPDATE carte SET disponibilitate='0' WHERE nr_inv='$nr_inv'";
        $conn->query($sql);
        $results->free();
      }
    }
    else {

    $sql = "SELECT nr_matricol FROM elev WHERE nume='$nume' AND prenume='$prenume' AND clasa='$clasa'";

    $results =$conn->query($sql);

    if($results->num_rows>0){

    $user_imp =$results->fetch_assoc();
    $results->free();

      $sql = "SELECT DATEDIFF (CURDATE(), data_imprumut) AS diferenta, id FROM imprumut WHERE nr_matr='$user_imp[nr_matricol]' AND id_carte='$nr_inv' AND data_restituire IS NULL";

    $results = $conn->query($sql);

    $restanta = $results->fetch_assoc();

    $sql = "UPDATE imprumut SET data_restituire=CURDATE()
            WHERE nr_matr='$user_imp[nr_matricol]' AND id_carte='$nr_inv' AND data_restituire IS NULL";
      if ($conn->query($sql)) {
        $res_rec=1;
        $sql="UPDATE carte SET disponibilitate='0' WHERE nr_inv='$nr_inv'";
        $conn->query($sql);
    }
    }
    }
    }
    }


    ?>



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
                <a class="navbar-brand" href="index.html">Administrare biblioteca</a>
            </div>
            <!-- Top Menu Items -->
            <?phpinclude_once "menu_top.php" ?>
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
                            Dashboard <small>Statistics Overview</small>
                        </h2>
                    </div>
                </div>
                <!-- /.row -->

                <?php if($add_rec==1){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Succes</strong> Imprumut nou realizat cu succes !
                        </div>
                    </div>
                </div>

                <?php } ?>

                <?php if($res_rec==1){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Succes</strong> Cartea a fost restituita !
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                      <?php if($restanta['diferenta'] > 0){ ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>
                            <strong>
                              <?php
                                if($restanta['diferenta'] > 0)
                                  if($restanta['diferenta'] == 1)
                                    echo $restanta['diferenta'] . " zi intarziere";
                                  else
                                    echo $restanta['diferenta'] . " zile intarziere";
                                  ?>
                            </strong>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <?php } ?>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-user fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                          <?php
                                          echo usercount();
                                          ?>
                                        </div>
                                        <div>Cititori</div>
                                    </div>
                                </div>
                            </div>
                            <a href="cititori.php?sort=0">
                                <div class="panel-footer">
                                    <span class="pull-left">Vizualizeaza</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-book fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo bookcount()?></div>
                                        <div>Carti</div>
                                    </div>
                                </div>
                            </div>
                            <a href="carti.php?sort=0">
                                <div class="panel-footer">
                                    <span class="pull-left">Vizualizeaza</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-tag fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo borrowedcount()?></div>
                                        <div>Carti imprumutate</div>
                                    </div>
                                </div>
                            </div>
                            <a href="cititori.php?sort=2">
                                <div class="panel-footer">
                                    <span class="pull-left">vizualizeaza</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-alert fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo debtorscount(); ?></div>
                                        <div>Restantieri</div>
                                    </div>
                                </div>
                            </div>
                            <a href="cititori.php?sort=3">
                                <div class="panel-footer">
                                    <span class="pull-left">Vizualizeaza</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- /.row -->

                <!--<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /.row -->

                <div class="row">

                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Imprumut</h3>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                  <div class="form-group">
                                      <input name="titlu" class="form-control" placeholder="Titlul cartii" required>
                                  </div>
                                  <div class="form-group">
                                      <input name="volum" class="form-control" placeholder="Volumul cartii" required>
                                  </div>
                                  <div class="form-group">
                                    <input name="nr_mat" class="form-control" placeholder="Numar matricol elev">
                                  </div>
                                  <div class="alert alert-info">
                                      <strong><u>Sau !</u></strong> Puteti completa campurile de mai jos lasand numarul matricol liber
                                  </div>
                                  <div class="form-group">
                                    <input name="nume" class="form-control" placeholder="Nume">
                                  </div>
                                  <div class="form-group">
                                    <input name="prenume" class="form-control" placeholder="Prenume">
                                  </div>
                                  <div class="form-group">
                                    <input type="text" name="clasa" class="form-control" placeholder="Clasa">
                                  </div>
                                  <div class="form-group">
                                    <input type="submit" class="btn btn-default" name="imprumut" value="Trimite">
                                  </div>

                                </form>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Restituiri</h3>
                            </div>
                            <div class="panel-body">
                                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <div class="form-group">
                                        <input name="nr_inv" class="form-control" placeholder="Numar inventar carte" required>
                                    </div>
                                    <div class="form-group">
                                      <input name="nr_mat" class="form-control" placeholder="Numar matricol elev">
                                    </div>
                                    <div class="alert alert-info">
                                        <strong><u>Sau !</u></strong> Puteti completa campurile de mai jos lasand numarul matricol liber
                                    </div>
                                    <div class="form-group">
                                      <input name="nume" class="form-control" placeholder="Nume">
                                    </div>
                                    <div class="form-group">
                                      <input name="prenume" class="form-control" placeholder="Prenume">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="clasa" class="form-control" placeholder="Clasa">
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" class="btn btn-default" name="restituire" value="Trimite">
                                    </div>
                                  </form>
                                </div>
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
    <script src="footer.js"></script>


</body>

</html>
