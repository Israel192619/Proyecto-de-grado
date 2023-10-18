<?php

//Add new menu item
if (isset($_POST['addItem'])) {

	if (!empty($_POST['itemName']) && !empty($_POST['itemPrice']) && !empty($_POST['menuID'])) {


		$itemname = $_POST['itemName'];
		$limpio = trim($itemname);

		$itemName = $sqlconnection->real_escape_string($limpio);
		$itemPrice = $sqlconnection->real_escape_string($_POST['itemPrice']);
		$menuID = $sqlconnection->real_escape_string($_POST['menuID']);

		
		$sql = "SELECT * FROM tbl_menuitem WHERE menuItemName ='$itemname'";
		if ($result = $sqlconnection->query($sql)) {
			if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				header("Location: menu.php");
			} else {

				$addItemQuery = "INSERT INTO tbl_menuitem (menuID ,menuItemName ,price) VALUES ({$menuID} ,'{$itemName}' ,{$itemPrice})";

				if ($sqlconnection->query($addItemQuery) === TRUE) {
					header("Location: menu.php");
					exit();

				} else {
					//handle
					echo "someting wong";
					echo $sqlconnection->error;
				}
			}

		}


	}

	//No input handle
	else {
		echo "Jangan bia kosong bang";
	}

}


?>