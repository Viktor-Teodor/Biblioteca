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
            <<?php include_once "menu_top.php" ?>
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
                            Carti <small> Operatiuni carti</small>
                        </h2>
                    </div>
                </div>

                <!-- /.row -->
                  <?php //include_once "mini_stats.php"; ?>
                  <?php //include_once 'modal.php'; ?>
                  <?php include_once 'modal_addbooks.php'; ?>
                  <?php include_once 'modal_modbooks.php'; ?>
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
                                          <div>Carte</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#" data-toggle="modal" data-target="#add_books">
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
                                          <div>Carte</div>
                                      </div>
                                  </div>
                              </div>
                                <a href="#" data-toggle="modal" data-target="#mod_books">
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
                                          <div>Carte</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#">
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
                                          <div>Carte</div>
                                      </div>
                                  </div>
                              </div>
                              <a href="#">
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
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Rezultate</h3>
                            </div>
                            <div class="panel-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-hover table-striped">
                                          <thead>
                                              <tr>
                                                  <th>Numar Inventar</th>
                                                  <th>Titlu</th>
                                                  <th>Autor</th>
                                                  <th>Pret</th>
                                                  <th>Editura</th>
                                                  <th>Categoria</th>
                                                  <th>Volum</th>
                                                  <th>Disponibilitate</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                  <?php
                                                   require_once 'paginator.php';

                                                  $conn=new mysqli("localhost","root","","biblioteca");

                                                  $limit=10;
                                                  $links=3;
                                                  $query = "SELECT * FROM carte ORDER BY nr_inv ASC";
                                                  $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

                                                  $Paginator  = new Paginator( $conn, $query );

                                                  $results    = $Paginator->getData( $limit, $page );


                                                 for( $i = 0; $i < count( $results->data ); $i++ ){  ?>
                                                    <tr>
                                                      <td><?php echo $results->data[$i]['nr_inv']; ?></td>
                                                      <td><?php echo $results->data[$i]['titlu']; ?></td>
                                                      <td><?php echo $results->data[$i]['autor']; ?></td>
                                                      <td><?php echo $results->data[$i]['pret']; ?></td>
                                                      <td><?php echo $results->data[$i]['editura']; ?></td>
                                                      <td><?php echo $results->data[$i]['categorie']; ?></td>
                                                      <td><?php echo $results->data[$i]['volum']; ?></td>
                                                      <td><?php echo $results->data[$i]['disponibilitate']; ?></td>
                                                    </tr>
                                                  <?php } ?>

                                          </tbody>
                                      </table>
                                  </div>
                                  <?php
                                 echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
                                  ?>
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
