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
        $dbname = "user_groups";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        //insert into group_master table
        $INSERTgroup = "INSERT Into group_master (groupname) values('$groupname')";
        if(!mysqli_query($conn, $INSERTgroup))
            printf("error: %s\n", mysqli_error($conn));

        //insert into user specific table

        $SELECT = "SELECT * FROM group_master WHERE groupname = '$groupname'";
        $result = mysqli_query($conn, $SELECT);
        $row = mysqli_fetch_array($result);

        $uid = $_SESSION['uid'];
        $groupidx = $row['groupidx'];
        $INSERT = "INSERT Into $uid (groupname, groupidx) values('$groupname', '$groupidx')";

        if(!mysqli_query($conn, $INSERT))
            printf("error: %s\n", mysqli_error($conn));


        mysqli_close($conn);

        //create group_users table
        $dbname = "group_users";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        $sql = "CREATE TABLE $groupname (
                uid VARCHAR(30))";
        
        if (mysqli_query($conn, $sql)) {
            echo "Groupname table created successfully";
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        $INSERT = "INSERT Into $groupname (uid) values('$uid')";

        if(!mysqli_query($conn, $INSERT))
            printf("error: %s\n", mysqli_error($conn));
        else
            header('Location: index.php');
    
        mysqli_close($conn);
    }
}