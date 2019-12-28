<?php
if(isset($_POST['signup-submit'])){
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

if(empty($username) || empty($password) || empty($email) || empty($passwordRepeat)){
    echo "All fields are required";
    die();
}
else if($password != $passwordRepeat){
    echo "Passwords must match";
    die();
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
    else{
    $SELECT = "SELECT username From formtest Where username = ? Limit 1";
    $INSERT = "INSERT Into formtest (username, password, email) values(?, ?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();
        echo "New record inserted sucessfully";
    } else {
        echo "Someone already register using this username";
    }
    $stmt->close();
    }
}
die();
}
?>