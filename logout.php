<?php
	require_once('admin/session.php');
	require_once('admin/classUser.php');
	$user_logout = new USER();

	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('Principal.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('index.php');
	}

	session_destroy();
