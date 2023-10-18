<?php

include("../functions.php");

if ((!isset($_SESSION['uid']) && !isset($_SESSION['username']) && isset($_SESSION['user_level'])))
	header("Location: login.php");

if ($_SESSION['user_level'] != "admin")
	header("Location: login.php");

if (isset($_POST['btnedit'])) {

	if (!empty($_POST['itemName']) && !empty($_POST['itemPrice'])) {

		$itemname = $_POST['itemName'];
		$limpio = trim($itemname);

		$itemName = $sqlconnection->real_escape_string($limpio);

		$menuID = $sqlconnection->real_escape_string($_POST['menuID']);
		$itemID = $sqlconnection->real_escape_string($_POST['itemID']);
		$itemName = $sqlconnection->real_escape_string($_POST['itemName']);
		$itemPrice = $sqlconnection->real_escape_string($_POST['itemPrice']);


		$sql = "SELECT * FROM tbl_menuitem WHERE menuItemName ='$itemName'";
		if ($result = $sqlconnection->query($sql)) {
			if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				header("Location: menu.php");
			} else {
				$updateItemQuery = "UPDATE tbl_menuitem SET menuItemName = '{$itemName}' , price = {$itemPrice} WHERE menuID = {$menuID} AND itemID = {$itemID} ";

				if ($sqlconnection->query($updateItemQuery) === TRUE) {
					header("Location: menu.php");
					exit();
				} else {
					//handle
					echo "someting wong";
					echo $sqlconnection->error;
					echo $updateItemQuery;
				}

			}
		}


	}
}

?>