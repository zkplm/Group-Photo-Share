<?php
	require "header.php";
	
	// Create database connection
	$db = mysqli_connect("localhost", "root", "", "photos");

	// Initialize message variable
	$msg = "";

	// Get image name
	$image = $_FILES['image']['name'];
	// Get text
	$msg = mysqli_real_escape_string($db, $_POST['image_text']);
	$group = $_SESSION['group'];
	$curUser = $_SESSION['uid'];

	// image file directory
	$target = 'phototable/'.basename($image);

	$sql = "INSERT INTO phototable(image, text, groupName, uid) VALUES ('$image', '$msg', '$group', '$curUser')";
	// execute query
	if(!mysqli_query($db, $sql))
		printf("error: %s\n", mysqli_error($db));

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		header('Location: index.php');
	}else{
		echo "<p>Failed to upload image</p>";
	}
?>