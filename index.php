<!DOCTYPE html><?php require_once('admin/session.php');
require_once('admin/classUser.php');
$login=new user();
?>
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
                    <li class="active">
                        <a href="#">Acasa</a>
                    </li>
                    <li>
                        <a href="cartielevi.php">Carti</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="galerie.html">Galerie</a>
                    </li>
                    <?php
                    //  if($login->is_loggedin()){
                    //      echo '<li> <a href="istoric.php">Istoric</a></li>';
                  //    }
                    ?>
                </ul>
                <?php  if(!$login->is_loggedin()){?>
                <form class="navbar-form navbar-right" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
              <input type="text" name="username" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="pass" placeholder="Parola" class="form-control">
            </div>
            <button name="login" style="background-color: #0d0d0d; border-color: #0d0d0d;" type="submit" class="btn btn-success">Log in</button>

          </form>
          <?php }
          else {
            echo '<form class="navbar-form navbar-right" method="post">';
            echo '<span style="color:white">'.$_SESSION['user_nume'].' '.$_SESSION['user_prenume'].'</span>';
            echo "<span style='padding-left:25px'><a href='logout.php'><button type='button' class='btn btn-default xs' style='background-color: #0d0d0d; border-color: #0d0d0d;'> Log out<?button></a></span>";
          //  echo '</ul>';
        }?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php
    if(!$login->is_loggedin())
      $_SESSION['logg']=0;
    	if(isset($_POST['login']))
    	{
    		$uname = htmlspecialchars($_POST['username']);
    		$upass = htmlspecialchars($_POST['pass']);

    		if($login->doLogin($uname,$upass))
    		{
          if($uname=="Admin")
    			   $login->redirect('admin/index.php');
          else{
            $_SESSION['logg']=1;$login->redirect('index.php');}
    		}
    		else
    		{
    			$error = "Wrong Details !";
    		}
    	}
      ?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="poze/poza1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">

            </div>
          </div>
        </div>
        <div class="item">
          <img  class="second-slide" src="poze/poza3.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">

            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="poze/poza4.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">

            </div>
          </div>
        </div>
      </div>
      <a  class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a   class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
        <div class="container">
          <h2 align="center">Biblioteca Liceului Teoretic "Dimitrie Cantemir" Iași</h2>
            <br>
            <br>
          <?php if($_SESSION['logg']==1){ ?>
          <div class="row">
              <div class="col-lg-12">
                  <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <i class="fa fa-info-circle"></i>  <strong>Succes</strong>V-ati log-at cu succes !
                  </div>
              </div>
          </div>

          <?php $_SESSION['logg']=0; }  ?>
    <div class="row">

      <p>Biblioteca Liceului Teoretic "Dimitrie Cantemir" din Iași a fost înființată o dată cu liceul, adică la data de 17 septembrie 1963.
      Biblioteca şcolară este destinată sprijinirii procesului instructiv-educativ, satisfacerii cerinţelor de informare documentară, de lectură şi de studiu ale elevilor, cadrelor didactice şi a celorlalte categorii de personal. Prin “activitatea bibliotecii” se înţelege ansamblul acţiunilor legate de buna ei funcţionare: procurarea şi prelucrarea publicaţiilor, organizarea cataloagelor, întocmirea de bibliografii, servirea cititorilor, acţiuni de popularizare a cărţii etc., biblioteca participând la realizarea obiectivelor sistemului de învăţământ, în ansamblul său, precum şi a obiectivelor educaţionale pe niveluri de studii şi profiluri de învăţământ. Biblioteca împrumută publicaţii şi documente atât în timpul anului şcolar cât şi în timpul vacanţelor şcolare, exceptând perioadele de inventariere şi de concediu legal al bibliotecarului.
      </p>
      </div>
      <br>
      <br>
      <div class="row">
          <div class="col-md-6">
          <img src="poze/poza2.jpg" width="550px" height="400px">
          </div>
          <div class="col-md-6">
          <img src="poze/poza6.jpg" width="550px" height="400px">
          </div>

        </div>
          <br>
          <hr>

          <br>
          <div class="row">
          <h2 align="center">
          Misiunea bibliotecii
          </h2>
          <p>Biblioteca şcolară exercită un rol important în orientarea intelectuală a utilizatorilor săi, în informarea şi reţinerea gustului pentru lectură, pentru studiu, în scopul cristalizării unui sistem de informare propriu.
            Prin activitatea sa, biblioteca şcolară participă la realizarea obiectivelor sistemului de învăţământ, în ansamblul său, precum şi a obiectivelor educaţionale pe etape de studiu.
      </p>

    </div>
  <br>
  <hr>
  <div class="row">
  <h2 align="center">Fondul de carte</h2>
  <p>Biblioteca are în posesie 27.641 de volume în valoare de 13.927,96 lei.</p>
  <p>Structura fondului de carte:</p>

  <ul style="list-style-type:none" class="lista">

  <li>Ideologie - 297 cărți</li>
  <li>Științe naturale și matematică - 3.316 cărți</li>
  <li>Tehnică - 1.351 cărți</li>
  <li>Agricultură - 24 cărți</li>
  <li>Literatură - 13.162 cărți</li>
  <li>Literatură pentru copii - 4.084 cărți</li>
  <li>Alte materii - 5.407 cărți</li>


  </ul>
  </div>
  <br>
  <hr>
  <div class="row">
  <div class="col-md-6">
  <h2 align="center">Bibliotecar actual</h2>
  <p>Bibliotecar Elena Crăcană - 9 septembrie 1977 - prezent</p>
  </div>
  <div class="col-md-6">
  <h2 align="center">Orarul de funcționare</h2>
  <p>Luni - Miercuri - Vineri, orele 08:00 - 16:00</p>
  <p> Marţi – Joi, orele 12:00 – 20:00</p>
  </div>
  </div>


  </div>
    <hr>
    <footer class="container">
      <p class="pull-right"><a href="#">Înapoi sus</a></p>
      <p>&copy; 2017 Stoian Victor-Teodor, Hapenciuc George, Strilciuc Gabriel, Parfeni Teodor</p>
    </footer>

<!-- /.container -->

</div>
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
