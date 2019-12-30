<?php
    require "header.php";

    $_SESSION['group'] = $_POST['input-group'];

    header('Location: index.php');
    die();