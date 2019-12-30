<?php
    require "header.php";
    
if(isset($_POST['cg-submit'])){
    $groupname = $_POST['groupname'];

    if(empty($groupname)){
        header('Location: index.php');
    }
    else{
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "group_users";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        $sql = "CREATE TABLE $groupname (
            uid VARCHAR(30))";

        if (mysqli_query($conn, $sql)) {
            echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        $uid = $_SESSION['uid'];
        
        $INSERT = "INSERT Into $groupname (uid) values('$uid')";

        if(!mysqli_query($conn, $INSERT))
            printf("error: %s\n", mysqli_error($db));
        else
            header('Location: index.php');


        mysqli_close($conn);
    }
}