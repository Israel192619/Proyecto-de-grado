<?php
include("../functions.php");

if ((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])))
	header("Location: login.php");

if ($_SESSION['user_level'] != "admin")
	header("Location: login.php");

if (isset($_POST['addstaff'])) {

	if (!empty($_POST['staffname']) && !empty($_POST['staffrole'])) {

		$staffName = $_POST['staffname'];
		$limpio = trim($staffName);
		$staffRole = $sqlconnection->real_escape_string($_POST['staffrole']);
		$username = $sqlconnection->real_escape_string($limpio);
		$sql = "SELECT * FROM tbl_staff WHERE username ='$username'";

		if ($result = $sqlconnection->query($sql)) {
			if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				header("Location: staff.php");
			}else{
				$addStaffQuery = "INSERT INTO tbl_staff (username ,password ,status ,role) VALUES ('{$username}' ,'1234abcd..' ,'Offline' ,'{$staffRole}') ";
				if ($sqlconnection->query($addStaffQuery) === TRUE) {
					echo "added.";
					header("Location: staff.php");
					exit();
		
				} else {
					//handle
					echo "someting wong";
					echo $sqlconnection->error;
				}
			}
			}
		//$staffUsername = $sqlconnection->real_escape_string($_POST['staffname']);
		//$staffRole = $sqlconnection->real_escape_string($_POST['staffrole']);


		

		
	}
}
?>