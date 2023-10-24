<?php
session_start(); // Start a session

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the projectId field is set and is a positive integer
    if (isset($_POST["projectId"]) && is_numeric($_POST["projectId"]) && $_POST["projectId"] > 0) {
        $projectId = $_POST["projectId"];

        // Query the database to get the file paths of the images associated with this project
        $sql = "SELECT projectImage, projectImage2, projectImage3 FROM projects WHERE id = $projectId";
        $result = $conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();

            // Delete the project from the database
            $delete_query = "DELETE FROM projects WHERE id = $projectId";
            if ($conn->query($delete_query) === TRUE) {
                // Deletion from the database was successful

                // Delete the files from the local directory
                unlink($_SERVER['DOCUMENT_ROOT'] . $row['projectImage']);
                unlink($_SERVER['DOCUMENT_ROOT'] . $row['projectImage2']);
                unlink($_SERVER['DOCUMENT_ROOT'] . $row['projectImage3']);

                echo "Deleted";
                header("Location: ../viewScripts/projects.php"); // Redirect to your projects page
                exit();
            } else {
                // Deletion from the database failed
                echo "Error deleting project: " . $conn->error;
            }
        } else {
            // Error fetching project details from the database
            echo "Error fetching project details: " . $conn->error;
        }
    } else {
        // Invalid projectId
        echo "Invalid project ID.";
    }
} else {
    // Redirect to the projects page if accessed without a POST request
    header("Location:  ../../dashboard.php");
    exit();
}
?>
