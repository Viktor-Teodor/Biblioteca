<?php
include_once 'session.php';
 //session_start();
include_once 'classUser.php';
include_once 'function.php';
include_once "errors.php" ;
include_once 'modal_findbook.php';
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
                            Rezultate
                        </h2>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
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

                                require_once 'paginator.php';

                                $conn=new mysqli("localhost","root","","biblioteca");

                                $result=array();
                                $row=array();

                                if($_SESSION['query_de_elevi'])
                                  $query=$_SESSION['query_de_elevi'];

                                $limit=10;
                                $links=3;
                                $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
                                $Paginator  = new Paginator( $conn, $query );
                                $results    = $Paginator->getData( $limit, $page );

                                for( $i = 0; $i < count( $results->data ); $i++ ){  ?>
                                   <tr>
                                     <td><?php echo $results->data[$i]['nr_matricol']; ?></td>
                                     <td><?php echo $results->data[$i]['nume']; ?></td>
                                     <td><?php echo $results->data[$i]['prenume']; ?></td>
                                     <td><?php echo $results->data[$i]['clasa']; ?></td>
                                     <td><?php echo $results->data[$i]['telefon']; ?></td>
                                     <td><?php echo $results->data[$i]['email']; ?></td>
                                   </tr>
                                 <?php }
                                ?>
                        </tbody>
                    </table>
                    <?php
                   echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
                    ?>
                </div>

              </div>

              </div>
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
