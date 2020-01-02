<?php
require "header.php";

// need to delete notification
$group = $_POST['accept-group'];
$uid = $_SESSION['uid'];

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "notifications";
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

$DELETE = "DELETE FROM $uid WHERE notif = '$group'";

$stmt = $conn->prepare($DELETE);
$stmt->execute();

if(isset($_POST['accept-group'])){
    // add group to given user and user to given group
    // add user to group
    $dbname = "group_users";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $INSERT = "INSERT INTO $group (uid) values('$uid')";

    $stmt = $conn->prepare($INSERT);
    $stmt->execute();

    // add group to user
    $dbname = "user_groups";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    $SELECT = "SELECT * FROM group_master WHERE groupname = '$group'";
    $result = mysqli_query($conn, $SELECT);
    $row = mysqli_fetch_array($result);

    $idx = $row['groupidx'];
    $INSERT = "INSERT INTO $uid (groupidx, groupname) values('$idx', '$group')";

    $stmt = $conn->prepare($INSERT);
    $stmt->execute();

}
else if(isset($_POST['deny-group'])){
    // nothing right now
}

die();