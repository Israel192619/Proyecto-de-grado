<?php


//Add new menu (category)
if (isset($_POST['addmenu'])) {

	if (!empty($_POST['menuname'])) {
		$menuname = $_POST['menuname'];
		$limpio = trim($menuname);
		
		$menuname = $sqlconnection->real_escape_string($limpio);
		$sql = "SELECT * FROM tbl_menu WHERE menuName ='$menuname'";
		if ($result = $sqlconnection->query($sql)) {
			if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				header("Location: menu.php");
			} else {
				$addMenuQuery = "INSERT INTO tbl_menu (menuName) VALUES ('{$menuname}')";
				
				if ($sqlconnection->query($addMenuQuery) === TRUE) {
					header("Location: menu.php");
				} else {
					//handle
					echo "Ocurrio un error";
				}
			}

		}

	}

	//No input handle
	else {
		echo "Jangan bia kosong bang 12";
	}

}