<?php
include("functions.php");

//checking username and password input
if (isset($_POST['username']) && isset($_POST['password'])) {

    //prevent sql injection by escaping special characters
    $username = $sqlconnection->real_escape_string($_POST['username']);
    $password = $sqlconnection->real_escape_string($_POST['password']);

    //sql statement
    $sql = "SELECT * FROM tbl_staff WHERE username ='$username' AND password = '$password'";

    if ($result = $sqlconnection->query($sql)) {

        if ($row = $result->fetch_array(MYSQLI_ASSOC)) {

            $uid = $row['staffID'];
            $username = $row['username'];
            $role = $row['role'];

            $_SESSION['uid'] = $uid;
            $_SESSION['username'] = $username;
            $_SESSION['user_level'] = "staff"; // 1 - admin 2 - staff
            $_SESSION['user_role'] = $role;

            echo "correct";
        } else {
            $sql1 = "SELECT * FROM tbl_admin WHERE username ='$username' AND password = '$password'";
            if ($result1 = $sqlconnection->query($sql1)) {
                if ($row = $result1->fetch_array(MYSQLI_ASSOC)) {

                    $uid = $row['ID'];
                    $username = $row['username'];

                    $_SESSION['uid'] = $uid;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_level'] = "admin";

                    echo "correct1";
                } else {
                    echo "Nombre de usuario o contraseña incorrectos.";
                }

            }
        }

    }


}
?>