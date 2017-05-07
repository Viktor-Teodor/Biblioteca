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
    <div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input name="titlu" type="text" class="form-control" placeholder="Titlul cartii" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span></span>Cautare avansata</button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filtreaza dupa</label>
                                    <select class="form-control">
                                        <option value="0" selected>Toate cartile</option>
                                        <option value="1">Featured</option>
                                        <option value="2">Most popular</option>
                                        <option value="3">Top rated</option>
                                        <option value="4">Most commented</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Autor</label>
                                    <input name="autor" class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Editura</label>
                                    <input name="editura" class="form-control" type="text" />
                                  </div>

                                  <button type="submit" name="cauta" class="btn btn-primary" style="background-color:#000000"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" style="background-color:#000000"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
        </div>
  </div>





      <!-- FOOTER -->
      <footer class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

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
