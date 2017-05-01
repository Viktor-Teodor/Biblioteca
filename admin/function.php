<?php
function usercount(){
  //get total user number
  $conn=mysqli_connect("localhost","root","","biblioteca");
  // Check connection
  if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

  $sql="SELECT * FROM elev";

  if ($result=mysqli_query($conn,$sql))
    {
    // Return the number of rows in result set
    $nr=mysqli_num_rows($result);
    mysqli_free_result($result);
    }

  mysqli_close($conn);
  return $nr;
  }

  function bookcount(){
    //get total user number
    $conn=mysqli_connect("localhost","root","","biblioteca");
    // Check connection
    if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $sql="SELECT * FROM carte";

    if ($result=mysqli_query($conn,$sql))
      {
      // Return the number of rows in result set
      $nr=mysqli_num_rows($result);
      mysqli_free_result($result);
      }

    mysqli_close($conn);
    return $nr;
    }


    function borrowedcount(){
      //get total user number
      $conn=mysqli_connect("localhost","root","","biblioteca");
      // Check connection
      if (mysqli_connect_errno())
        {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

      $sql="SELECT * FROM imprumut WHERE data_restituire IS NULL";

      if ($result=mysqli_query($conn,$sql))
        {
        // Return the number of rows in result set
        $nr=mysqli_num_rows($result);
        mysqli_free_result($result);
        }

      mysqli_close($conn);
      return $nr;
      }


      function debtorscount(){
        //get total user number
        $conn=mysqli_connect("localhost","root","","biblioteca");
        // Check connection
        if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

        $sql="SELECT * FROM imprumut WHERE (DATEDIFF (CURDATE(), data_imprumut) > 14 AND !data_restituire) OR DATEDIFF(data_restituire, data_imprumut)>14";

        if ($result=mysqli_query($conn,$sql))
          {
          // Return the number of rows in result set

          $nr=mysqli_num_rows($result);
          mysqli_free_result($result);
          }

        mysqli_close($conn);
        return $nr;
        }

        function studentcount(){
          //get total user number
          $conn=mysqli_connect("localhost","root","","biblioteca");
          // Check connection
          if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

          $sql="SELECT * FROM elev where clasa != 'prof'";

          if ($result=mysqli_query($conn,$sql))
            {
            // Return the number of rows in result set
            $nr=mysqli_num_rows($result);
            mysqli_free_result($result);
            }

          mysqli_close($conn);
          return $nr;
          }


          function teachercount(){
            //get total user number
            $conn=mysqli_connect("localhost","root","","biblioteca");
            // Check connection
            if (mysqli_connect_errno())
              {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }

            $sql="SELECT * FROM elev where clasa = 'prof'";

            if ($result=mysqli_query($conn,$sql))
              {
              // Return the number of rows in result set
              $nr=mysqli_num_rows($result);
              mysqli_free_result($result);
              }

            mysqli_close($conn);
            return $nr;
            }

            // Adaugam un nou imprumut
                $add_rec=0;
              if(isset($_POST['imprumut'])){
                if($_POST['nr_mat'] != "Numar matricol"){
                $sql = "INSERT INTO imprumut (id_elev, id_carte, data_imp)
                        VALUES ('$_POST[nr_mat]', '$_POST[nr_inv]', CURDATE())";

                  if (mysqli_query($conn, $sql)) {
                    $add_rec=1;
                }
              }
              else {
                $sql = "SELECT nr_matricol FROM elev WHERE nume='$_POST[nume]' AND prenume='$_POST[prenume]' AND clasa='$_POST[clasa]'";
                $result = mysqli_query($conn, $sql);
                $user_imp = mysqli_fetch_assoc($result);
                $sql = "INSERT INTO imprumut (id_elev, id_carte, data_imp)
                        VALUES ('$user_imp[nr_matricol]', '$_POST[nr_inv]', CURDATE())";

                  if (mysqli_query($conn, $sql)) {
                    $add_rec=1;
                }
              }
            }

            //restituire carte
            $conn=mysqli_connect("localhost","root","","biblioteca");

                  $res_rec=0;
                if(isset($_POST['restituire'])){
                  if($_POST['nr_mat'] != "Numar matricol"){

                    $sql = "SELECT DATEDIFF (CURDATE(), data_imp) FROM imprumut WHERE DATEDIFF (CURDATE(), data_imp) > 14 AND id_elev='$_POST[nr_mat]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
                    $result = mysqli_query($conn, $sql);
                    $restanta = mysqli_fetch_assoc($result);

                    $sql = "UPDATE imprumut SET data_res=CURDATE()
                            WHERE id_elev='$_POST[nr_mat]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";

                  if (mysqli_query($conn, $sql)) {
                    $res_rec=1;
                }
                }
                else {
                $sql = "SELECT nr_matricol FROM elev WHERE nume='$_POST[nume]' AND prenume='$_POST[prenume]' AND clasa='$_POST[clasa]'";
                $result = mysqli_query($conn, $sql);
                $user_imp = mysqli_fetch_assoc($result);

                $sql = "SELECT DATEDIFF (CURDATE(), data_imp) FROM imprumut WHERE DATEDIFF (CURDATE(), data_imp) > 14 AND id_elev='$user_imp[nr_matricol]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
                $result = mysqli_query($conn, $sql);
                $restanta = mysqli_fetch_assoc($result);

                $sql = "UPDATE imprumut SET data_res=CURDATE()
                        WHERE id_elev='$user_imp[nr_matricol]' AND id_carte='$_POST[nr_inv]' AND data_res IS NULL";
                  if (mysqli_query($conn, $sql)) {
                    $res_rec=1;
                }
                }
                }



?>
