<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body style="padding-top:2em; background-color:#001a33;">
  <div class="box-wrap">

    <nav style="padding-bottom: 0px; margin-bottom: 0px; background-color: #262626"  class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Biblioteca D.C.</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="Principal.php">Acasa</a>
                    </li>
                    <li class="active">
                        <a href="#">Carti</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
              <input type="text" name="username" placeholder="Nume" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="Parola" class="form-control">
            </div>
            <button name="login" style="background-color: #0d0d0d; border-color: #0d0d0d;" type="submit" class="btn btn-success">Log in</button>
          </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <?php
    require_once('admin/classUser.php');
    require_once('admin/session.php');

                  $login=new user();
      if(isset($_POST['login']))
      {
        $uname = htmlspecialchars($_POST['username']);
        $upass = htmlspecialchars($_POST['pass']);
        if($login->doLogin($uname,$upass))
        {
          if($uname="ADMIN")
             $login->redirect('admin/index.php');
          else
            $login->redirect('Principal.php');
        }
        else
        {
          $error = "Wrong Details !";
        }
      }
      ?>


    <!-- Carousel
    ================================================== -->
    <img style="margin-bottom: 40px;" src="image5.jpg" width="100%" height="550px">

 <div class="container" style="padding-bottom:300px">
  <div class="row">
    <div class="col-lg-6 col-md-offset-3">
            <div class="panel-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                      <input name="titlu" class="form-control" placeholder="Titlul cartii">
                  </div>
                  <div class="form-group">
                      <input name="volum" class="form-control" placeholder="Volumul cartii">
                  </div>
                  <div class="form-group">
                      <input name="autor" class="form-control" placeholder="Autorul cartii">
                  </div>
                  <div class="form-group">
                    <input name="editura" class="form-control" placeholder="Editura">
                  </div>
                  <div class="form-group">
                    <input type="submit" align="right" class="btn btn-default" name="cauta" value="Cauta">
                  </div>
                </form>
            </div>
        </div>
    </div>

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

                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                    $titlu=htmlspecialchars($_REQUEST['titlu']); if($titlu==NULL) $titlu='%';
                                    $autor=htmlspecialchars($_REQUEST['autor']); if($autor==NULL) $autor='%';
                                    $editura=htmlspecialchars($_REQUEST['editura']); if($editura==NULL) $editura='%';
                                    $volum=htmlspecialchars($_REQUEST['volum']); if($volum==NULL) $volum='%';
                                  //  $categorie=htmlspecialchars($_REQUEST['categorie']); if($categorie=="Toate cartile") $categorie="%";
                                  $categorie='%';
                                      if(isset($_POST['cauta'])){
                                        $query="SELECT * FROM carte WHERE titlu LIKE '$titlu' AND autor LIKE '$autor' AND volum LIKE '$volum' AND editura LIKE '$editura' AND categorie LIKE '$categorie'";

                                    $limit=10;
                                    $links=3;
                                    $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;

                                    $Paginator  = new Paginator( $conn, $query );

                                    $results    = $Paginator->getData( $limit, $page );


                                   for( $i = 0; $i < count( $results->data ); $i++ ){
                                  
                                      echo"<tr>";
                                        echo"<td>".$results->data[$i]['titlu']."</td>
                                        <td>".$results->data[$i]['autor']."</td>
                                        <td>".$results->data[$i]['pret']."</td>
                                        <td>".$results->data[$i]['editura']."</td>
                                        <td>".$results->data[$i]['categorie']."</td>
                                        <td>".$results->data[$i]['volum']."</td>
                                        <td>".$results->data[$i]['disponibilitate']."</td>
                                      </tr>";
                                    }

                            echo "</tbody>
                        </table>
                    </div>";

                   echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
                 }}
                    ?>
              </div>
          </div>
      </div>
  </div>





    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
