<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['description']) && isset($_POST['title'])) {
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/uploads/projects/'; // Absolute path to store uploaded images
   $uploadedFile = $uploadDirectory . basename($_FILES['image']['name']);
    $uploadOk = 1; // Flag to check if the upload was successful

    // Check if the image file is a real image or a fake image
    if (getimagesize($_FILES['image']['tmp_name']) === false) {
        $error = "Invalid image file.";
        $uploadOk = 0;
    }

    // Check if the file already exists
    if (file_exists($uploadedFile)) {
        $error = "File already exists.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES['image']['size'] > 5000000) {
        $error = "File size is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file formats (you can customize this)
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedFormats)) {
        $error = "Unsupported file format.";
        $uploadOk = 0;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
            // File uploaded successfullyc

            $projectDescription = $_POST['description'];
            $projectTitle = $_POST['title'];
            $projectImageUrl = '/Acrus-innovation-hub/uploads/projects/'  . basename($_FILES['image']['name']); // Replace with the actual path
   
            //save to db

            $sql = "INSERT INTO projects (projectTitle, projectImage, projectDescription) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sss', $projectTitle, $projectImageUrl, $projectDescription);

            if ($stmt->execute()) {
                // echo "Message Sent";
                $success = "Image uploaded successfully.";
                $uri .= $_SERVER['HTTP_HOST'];
                header('Location: ' . '/Acrus-innovation-hub/admin/viewScripts/projects.php');
                echo $success;
            } else {
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
        } else {
            echo "something went wrong";
        }



     
    } else {
        $error = "Error uploading image.";
        echo $error;
        $uri .= $_SERVER['HTTP_HOST'];
        header('Location: ' . '/Acrus-innovation-hub/admin/uploadScripts/upload_project.php');
    }
}else{
    echo "somoe whent wrong";
}


?>