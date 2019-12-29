<?php
if(isset($_POST['login-submit'])){
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    if(empty($uid) || empty($password)){
        echo 'Must enter username and password';
        exit();
    }
    else{
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "test";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect error');
        }
        $SELECT = "SELECT * FROM formtest WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $SELECT)){
            echo "SQL Error";
            die();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $uid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);

                if($passwordCheck){
                    session_start();
                    $_SESSION['userIndex'] = $row['userIdx'];
                    $_SESSION['uid'] = $row['username'];

                    header('Location: index.php');
                    die();
                }
                else{
                    echo "Wrong password";
                    die();
                }
            }
            else{
                echo "No user found under the username $uid";
                die();
            }
        }

    }
}
else{
    // something
}