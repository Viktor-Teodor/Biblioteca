<!DOCTYPE html>
<?php     require_once('admin/session.php');
require_once('admin/classUser.php');
$errors=array();
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
                    <li>
                        <a href="index.php">Acasa</a>
                    </li>
                    <li class="active">
                        <a href="#">Carti</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="galerie.html">Galerie</a>
                    </li>
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
          $errors[] = "Wrong Details !";
        }
      }
      ?>


    <!-- Carousel
    ================================================== -->
    <img style="margin-bottom: 40px;" src="image5.jpg" width="100%" height="550px">

    <?php if($_SESSION['logg']==1){ ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  <strong>Succes</strong>V-ati log-at cu succes !
            </div>
        </div>
    </div>

    <?php $_SESSION['logg']=0;}  ?>




 <div class="container" style="padding-bottom:300px">
  <div class="row">
    <div class="col-lg-6 col-md-offset-3">
            <div class="panel-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                  <div class="form-group">
                      <input name="nr_inv" class="form-control" placeholder="Numarul de inventar al cartii pe care doriti sa o rezervati pentru 24 de ore">
                  </div>
                  <div class="form-group">
                    <input type="submit" align="right" class="btn btn-default" name="rezerva" value="rezerva">
                  </div>
</div>
</div>
<?php
$succ=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn=new mysqli("localhost","root","","biblioteca");

  if(isset($_POST['rezerva']) && $login->is_loggedin()){

$nr_inv=htmlspecialchars($_REQUEST['nr_inv']);
if($nr_inv!= NULL ){
$rez=$conn->query("SELECT * FROM rezervari WHERE DATEDIFF(CURDATE(),data_rezervare)>1");
while($rez->num_rows){
  $row=$rez->fetch_assoc();
  $conn->query("UPDATE carte SET disponibilitate=0 WHERE nr_inv='$row[nr_inv]'");
  $conn->query("DELETE FROM rezervari WHERE nr_inv='$row[nr_inv]'");
}
 $rez=$conn->query("SELECT * FROM carte WHERE nr_inv=$nr_inv");

 if($rez->num_rows!=1)
   $errors[]="Aceasta carte nu exista";
   else{
     $rez=$rez->fetch_assoc();
     if($rez['disponibilitate']!=0)
      $errors[]="Aceasta carte nu este disponibila";
     else{
       $rez=$conn->query("SELECT * FROM elev WHERE nume='$_SESSION[user_nume]' AND prenume='$_SESSION[user_prenume]' AND clasa='$_SESSION[user_clasa]'");
       $rez=$rez->fetch_assoc();
       $nr_matricol=$rez['nr_matricol'];

       $rez=$conn->query("SELECT * FROM rezervari WHERE nr_matr='$nr_matricol'");

       if($rez->num_rows>=3)
        $errors[]="Ati rezervat deja 3 carti, asteptati pana la expirarea unei rezervari sau anulati rezervarea";
      else
          if($conn->query("INSERT INTO rezervari(data_rezervare, nr_matr,nr_inv) VALUES (CURDATE(),'$nr_matricol','$nr_inv')")){
            $succ=1;
            $conn->query("UPDATE carte SET disponibilitate=-1 WHERE nr_inv='$nr_inv'");
          }
  }
}
}
else {
  $errors[]="Introduceti un numar de inventar";
}
}
}
?>


<?php if($succ==1){ $succ=0; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="fa fa-info-circle"></i>  <strong>Succes</strong> Ati rezervat cartea pentru 24 de ore !
        </div>
    </div>
</div>

<?php }  ?>

<?php
include_once "admin/errors.php";
foreach ($errors as $index => $error) {
  errors($error);
}
$errors=array();
?>

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
                  <label for="categorie">Categorie</label>
        						<select name="categorie">
        						<option>Toate cartile</option>
        						<option>Ideologie</option>
        						<option>Stiinte naturale si matematica</option>
        						<option>Tehnica</option>
        						<option>Agricultura</option>
        						<option>Literatura</option>
        						<option>Literatura pentru copii</option>
        						<option>Alte materii</option>
        					</select>
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
                              <th>Numar inventar</th>
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

                                $disp=array(1=>"Carte imprumutata", -1=>"Carte rezervata", 0=>"Carte disponibila");
                                $titlu='%';
                                $autor='%';
                                $editura='%';
                                $volum='%';
                                $categorie="%";
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                  if(isset($_POST['cauta'])){
                                $disp=array(1=>"Carte imprumutata", -1=>"Carte rezervata", 0=>"Carte disponibila");
                                $titlu=htmlspecialchars($_REQUEST['titlu']); if($titlu==NULL) $titlu='%';
                                $autor=htmlspecialchars($_REQUEST['autor']); if($autor==NULL) $autor='%';
                                $editura=htmlspecialchars($_REQUEST['editura']); if($editura==NULL) $editura='%';
                                $volum=htmlspecialchars($_REQUEST['volum']); if($volum==NULL) $volum='%';
                                $categorie=htmlspecialchars($_REQUEST['categorie']); if($categorie=="Toate cartile") $categorie="%";
                                }}
                                require_once 'admin/paginator.php';

                                $conn=new mysqli("localhost","root","","biblioteca");

                                $result=array();
                                $row=array();

                                $query="SELECT * FROM carte WHERE titlu LIKE '$titlu' AND autor LIKE '$autor' AND volum LIKE '$volum' AND editura LIKE '$editura' AND categorie LIKE '$categorie'";

                                $limit=10;
                                $links=3;
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
                                     <td><?php echo $disp[$results->data[$i]['disponibilitate']]; ?></td>
                                   </tr>
                                 <?php  } ?>
                        </tbody>
                    </table>
                    <?php
                   echo $Paginator->createLinks( $links, 'pagination pagination-sm' );

                    ?>
                </div>
      </div>
  </div>
</div>
</div>

<hr>
      <!-- FOOTER -->
      <footer class="container">
        <p class="pull-right"><a href="#">Înapoi sus</a></p>
        <p>&copy; 2017 Stoian Victor-Teodor, Hapenciuc George, Strilciuc Gabriel, Parfeni Teodor</p>
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
