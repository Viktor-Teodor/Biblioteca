<?php


class user{

  private $_conn;
  private $stmt;
     public function __construct() {
       $conn=new mysqli("localhost","root","","biblioteca");
         $this->_conn = $conn;
     }

     public function register($username,$pass,$nume,$prenume){

			$stmt = $this->_conn->query("INSERT INTO conturi (username,password,nume,prenume)
		                                               VALUES('$username', '$email', '$pass', '$nume', '$prenume')");

			return $stmt;

	}

  public function doLogin($username,$pass){
      $pass=hash('tiger128,3',$pass);
			$stmt = $this->_conn->query("SELECT id, username, password, nume, prenume, clasa FROM conturi WHERE username='$username'");

			$userRow=$stmt->fetch_assoc();

			if($stmt->num_rows == 1)
			{
				if($pass == $userRow['password'])
				{
          $_SESSION['user_clasa']=$userRow['clasa'];
					$_SESSION['user_session'] = $userRow['id'];
					$_SESSION['user_nume'] = $userRow['nume'];
					$_SESSION['user_prenume'] = $userRow['prenume'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}

    public function is_loggedin()
    	{
    		if(isset($_SESSION['user_session']))
    		{
    			return true;
    		}
    	}

    	public function redirect($url)
    	{
    		header("Location: $url");
    	}

    	public function doLogout()
    	{
    		session_destroy();
    		unset($_SESSION['user_session']);
    		return true;
    	}


    }

 ?>
