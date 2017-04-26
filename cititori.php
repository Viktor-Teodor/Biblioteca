<?php
include_once 'session.php';
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

    <title>SB Admin - Bootstrap Admin Template</title>

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

    <SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
    <!--
      var usersearchWindow=null;
      function usersearch(mypage,myname,w,h,pos,infocus){

      if (pos == 'random')
      {LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
      else
      {LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
      settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';usersearchWindow=window.open('',myname,settings);
      if(infocus=='front'){usersearchWindow.focus();usersearchWindow.location=mypage;}
      if(infocus=='back'){usersearchWindow.blur();usersearchWindow.location=mypage;usersearchWindow.blur();}

      }
      // -->
    </script>

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
                            Cititori <small> Operatiuni cititori</small>
                        </h2>
                    </div>
                </div>
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
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-apple fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo studentcount()?></div>
                                        <div>Elevi</div>
                                    </div>
                                </div>
                            </div>
                            <a href="cititori.php?sort=1">
                                <div class="panel-footer">
                                    <span class="pull-left">Vizualizeaza</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="glyphicon glyphicon-briefcase fa-4x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo teachercount()?></div>
                                        <div>Profesori</div>
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

                  <?php include_once 'modal.php'; ?>
                <!-- /.control for add and delete -->
                  <div class="row">
                      <div class="col-lg-3 col-md-6">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <div class="row">
                                      <div class="col-xs-3">
                                          <i class="glyphicon glyphicon-plus-sign fa-4x"></i>
                                      </div>
                                      <div class="col-xs-9 text-right">
                                          <div class="huge"> Adauga</div>
                                          <div>Cititor</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#" data-toggle="modal" data-target="#add_user">
                                  <div class="panel-footer">
                                      <span class="pull-left">View Details</span>
                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                      <div class="clearfix"></div>
                                  </div>
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <div class="row">
                                      <div class="col-xs-3">
                                          <i class="glyphicon glyphicon-pencil fa-4x"></i>
                                      </div>
                                      <div class="col-xs-9 text-right">
                                          <div class="huge">Modifica</div>
                                          <div>Cititor</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#" data-toggle="modal" data-target="#edit_user">
                                  <div class="panel-footer">
                                      <span class="pull-left">View Details</span>
                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                      <div class="clearfix"></div>
                                  </div>
                              </a>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-6">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <div class="row">
                                      <div class="col-xs-3">
                                          <i class="glyphicon glyphicon-search fa-4x"></i>
                                      </div>
                                      <div class="col-xs-9 text-right">
                                          <div class="huge">Cauta</div>
                                          <div>Cititor</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#" data-toggle="modal" data-target="#cauta_user">
                                  <div class="panel-footer">
                                      <span class="pull-left">View Details</span>
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
                                          <i class="glyphicon glyphicon-trash fa-4x"></i>
                                      </div>
                                      <div class="col-xs-9 text-right">
                                          <div class="huge">Sterge</div>
                                          <div>Cititor</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#" data-toggle="modal" data-target="#delete_user">
                                  <div class="panel-footer">
                                      <span class="pull-left">View Details</span>
                                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                      <div class="clearfix"></div>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
                            </div>
                            <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover table-striped">
                                          <thead>
                                              <tr>
                                                  <th>Numar matricol</th>
                                                  <th>Nume</th>
                                                  <th>Prenume</th>
                                                  <th>Clasa</th>
                                                  <th>Telefon</th>
                                                  <th>Email</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                  <?php
                                                  $sort=$_GET['sort'];
                                                  switch ($sort) {
                                                      case 0:
                                                          $sql = "SELECT * FROM elev ORDER BY nume ASC";
                                                          break;
                                                      case 1:
                                                          $sql = "SELECT * FROM elev WHERE clasa != 'prof' ORDER BY nume ASC";
                                                          break;
                                                      case 2:
                                                      $sql = "SELECT * FROM elev WHERE clasa = 'prof' ORDER BY nume ASC";
                                                          break;
                                                      case 3:
                                                      $sql_res="SELECT * FROM imprumut WHERE DATEDIFF (data_res, data_imp) > 14";
                                                          break;
                                                      case 4:
                                                      $sql="SELECT * FROM imprumut WHERE (DATEDIFF (CURDATE(), data_imp) > 14 AND data_res IS NULL)";
                                                          break;
                                                      case 5:
                                                      $sql="SELECT * FROM imprumut WHERE (DATEDIFF (CURDATE(), data_imp) > 14 AND data_res IS NULL) OR DATEDIFF (data_res, data_imp) > 14";
                                                          break;
                                                      default:
                                                      $sql = "SELECT * FROM elev ORDER BY nume ASC";

                                                  }
                                                  $conn=mysqli_connect("localhost","root","","biblioteca");
                                                    if($sort==3){
                                                      $result_res = mysqli_query($conn, $sql_res);
                                                      if (mysqli_num_rows($result_res) > 0){
                                                      while($row_res = mysqli_fetch_assoc($result_res)){
                                                        $sql = "SELECT * FROM elev WHERE nr_matricol = '$row_res[id_elev]' ORDER BY nume ASC";
                                                          if (mysqli_num_rows($result) > 0) {
                                                            $result = mysqli_query($conn, $sql);

                                                        // output data of each row
                                                          while($row = mysqli_fetch_assoc($result)) {
                                                            echo '
                                                            <tr>
                                                            <td>'.$row["nr_matricol"].'</td>
                                                            <td>'.$row["nume"].'</td>
                                                            <td>'.$row["prenume"].'</td>
                                                            <td>'.$row["clasa"].'</td>
                                                            <td>'.$row["telefon"].'</td>
                                                            <td>'.$row["email"].'</td>
                                                            </tr>';
                                                        }
                                                    } else
                                                        echo "0 results";
                                                  }
                                                }
                                              }
                                              else {
                                                if (mysqli_num_rows($result) > 0) {
                                                  $result = mysqli_query($conn, $sql);

                                              // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                  echo '
                                                  <tr>
                                                  <td>'.$row["nr_matricol"].'</td>
                                                  <td>'.$row["nume"].'</td>
                                                  <td>'.$row["prenume"].'</td>
                                                  <td>'.$row["clasa"].'</td>
                                                  <td>'.$row["telefon"].'</td>
                                                  <td>'.$row["email"].'</td>
                                                  </tr>';
                                              }
                                          } else
                                              echo "0 results";
                                              }
                                                  ?>
                                              </tr>
                                          </tbody>
                                      </table>
                                  </div>
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


</body>

</html>
