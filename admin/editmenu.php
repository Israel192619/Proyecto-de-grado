<?php

	include("../functions.php");

	if((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])) ) 
		header("Location: login.php");

	if($_SESSION['user_level'] != "admin")
		header("Location: login.php");

	if(isset($_POST['editmenu'])) {

		if (!empty($_POST['menuname']) ) {

			$menuid = $sqlconnection->real_escape_string($_POST['menuid']);
			$menuname = $sqlconnection->real_escape_string($_POST['menuname']);

			$updateItemQuery = "UPDATE tbl_menu SET menuName = '{$menuname}' WHERE menuID = {$menuid}";


			if ($sqlconnection->query($updateItemQuery) === TRUE) {
				header("Location: menu.php"); 
				exit();
			} 

			else {
				//handle
				echo "someting wong";
				echo $sqlconnection->error;
				echo $updateItemQuery;
			}

		}
	} 

?>