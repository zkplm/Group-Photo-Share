<?php
require "header.php";

if(isset($_POST['invite-submit'])){
    $uid = $_POST['uid'];

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";

    // 1. see if user exists

    $dbname = "test";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $SELECT = "SELECT username From formtest Where username = ? Limit 1";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $stmt->bind_result($uid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0) {
        echo "User doesn't exist";
        die;
    }

    // 2. check if user is already a member of that group

    $dbname = "group_users";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $groupname = $_SESSION['group'];
    $SELECT = "SELECT uid From $groupname Where uid = '$uid' Limit 1";

    $stmt = $conn->prepare($SELECT);
    $stmt->execute();
    $stmt->bind_result($uid);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==1) {
        echo "User is already a member of that group.";
        die();
    }

    // 3. send invite to user to join

    $dbname = "notifications";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if(mysqli_connect_error()){
        die('Connect error');
    }

    $curruid = $_SESSION['uid'];
    $INSERT = "INSERT Into $uid (uid, notif) values('$curruid', '$groupname')";
    if(!mysqli_query($conn, $INSERT))
		printf("error: %s\n", mysqli_error($db));

    mysqli_close($conn);

    // go back to index
    header('Location: index.php');

    die();
}
?>