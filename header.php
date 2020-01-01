<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        $_SESSION['uid'] = NULL;
    }
    if(!isset($_SESSION['group'])){
        $_SESSION['group'] = NULL;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <meta name="description" content="Test website for sharing photos">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Test</title>
</head>
<body>
    <header>
        <nav>
            <ul id="nav-ul">
                <li id="nav-li"><a id="nav-a" href="index.php">Home</a></li>
                <?php
                if(NULL==$_SESSION['uid'] || $_SESSION['uid'] == ""){
                    echo "<li id='nav-li'><a id='nav-a' href='loginpage.php'>Login</a></li>";
                    echo "<li id='nav-li'><a id='nav-a' href='sign-uppage.php'>Sign Up</a></li>";
                }
                else{
                    echo "<li id='nav-li'><a id='nav-a' href='logout.php'>Logout</a></li>";
                    $uid = $_SESSION['uid'];
                    echo "<li id='nav-uid'><p>$uid</p></li>";
                }
                ?>
            </ul>
        </nav>
    </header>
</body>
</html>