<?php
// Include your database connection code (assuming you have a $conn variable)
session_start(); // Start a session

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the message_id field is set and is a positive integer
    if (isset($_POST["projectId"]) && is_numeric($_POST["projectId"]) && $_POST["projectId"] > 0) {
        $projectId = $_POST["projectId"];
        
        // SQL query to delete the message with the specified ID
        $delete_query = "DELETE FROM projects WHERE id = $projectId";
        
        if ($conn->query($delete_query) === TRUE) {
            // Deletion was successful
            echo "Deleted";
            header("Location: ../viewScripts/projects.php"); // Redirect to your messages page
            exit();
        } else {
            // Deletion failed
            echo "Error deleting message: " . $conn->error;
        }
    } else {
        // Invalid message_id
        echo "Invalid message ID.";
    }
} else {
    // Redirect to the messages page if accessed without a POST request
    header("Location:  ../../dashboard.php");
    exit();
}
?>
