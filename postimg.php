<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "photos");

  // Initialize message variable
  $msg = "";

  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$msg = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
	$target = 'phototable/'.basename($image);

  	$sql = "INSERT INTO phototable(image, text) VALUES ('$image', '$msg')";
  	// execute query
	if(!mysqli_query($db, $sql))
		printf("error: %s\n", mysqli_error($db));

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		echo "Image uploaded successfully";
  	}else{
  		echo "Failed to upload image";
    }
      
  $result = mysqli_query($db, "SELECT * FROM phototable");
?>