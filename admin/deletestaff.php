<?php

include("../functions.php");

if (isset($_POST['deletestaff'])) {

	
	if (!empty($_POST['staffID'])) {
		

		$del_staffID = $sqlconnection->real_escape_string($_POST['staffID']);

		$deleteStaffQuery = "DELETE FROM tbl_staff WHERE staffID = {$del_staffID}";

		if ($sqlconnection->query($deleteStaffQuery) === TRUE) {
			echo "deleted.";
			header("Location: staff.php");
			exit();
		} else {
			//handle
			echo "someting wong";
			echo $sqlconnection->error;

		}
		//echo "<script>alert('{$del_menuID} & {$del_itemID}')</script>";
	}else{
		print_r($_POST['staffID']);
	}
}

?>