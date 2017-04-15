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

?>
