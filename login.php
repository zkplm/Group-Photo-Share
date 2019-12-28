<?php
if(isset($_POST['login-submit'])){
    $emailuid = $_POST['emailuid'];
    $password = $_POST['password'];

    if(empty($emailuid) || empty($password)){
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
        $SELECT = "SELECT * FROM formtest WHERE username = ? OR email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $SELECT)){
            echo "SQL Error";
            die();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $emailuid, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['password']);
                $dumb = $row['password'];
                echo "Password: $password   Real password: $dumb    ";

                if($passwordCheck == true){
                    echo "password check passed";
                    session_start();
                    $_SESSION[] = $row['username'];
                }
                else{
                    echo "Wrong password";
                    die();
                }
            }
            else{
                echo "No user found";
                die();
            }
        }

    }
}
else{
    // something
}