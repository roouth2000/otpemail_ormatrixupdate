<?php
// Establish the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ravi";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a file was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Retrieve the image data
    $imageData = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    // Prepare the SQL statement
    $sql = "INSERT INTO images (image_data) VALUES ('$imageData')"; 	 	

    // Execute the SQL statement
    if ($conn->query($sql) === true) {
        echo "Image inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No image uploaded.";
}

// Close the database connection
$conn->close();
?>
<html>
  <head>
  </head>
	  <body>
	     <h1>Select Image to Upload</h1>
	     <form method="post" action="image.php" enctype="multipart/form-data">
	         <input type="file" name="image">
	         <input type="submit" value="Upload">
	  </form>
	  </body>
</html>