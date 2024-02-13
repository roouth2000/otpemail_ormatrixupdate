<?php
$uploadDir = 'http://192.168.29.141/uploads/';
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
    $fileInfo = $_FILES['document'];
    $fileName = $fileInfo['name'];
    $fileTmpPath = $fileInfo['tmp_name'];
    $fileSize = $fileInfo['size'];
    $fileType = $fileInfo['type'];

    $uploadPath = $uploadDir . $fileName;

    if (move_uploaded_file($fileTmpPath, $uploadPath)) {
        // File uploaded successfully
        $response['status'] = 'success';
        $response['message'] = 'File uploaded successfully.';
        $response['file_name'] = $fileName;
        $response['file_path'] = $uploadPath;

        // Save file information to the database (MySQL)
        $conn = mysqli_connect("localhost", "root", "", "ormatrix");
        $query = "INSERT INTO files (file_name, file_path) VALUES ('$fileName', '$uploadPath')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
    } else {
        // Failed to upload file
        $response['status'] = 'error';
        $response['message'] = 'Failed to upload file.';
    }
} else {
    // Invalid request
    $response['status'] = 'error';
    $response['message'] = 'Invalid request.';
}

echo json_encode($response);
?>