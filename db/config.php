<?php
// Database configuration
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "MYDB";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $database";

// if(mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
if (!mysqli_select_db($conn, $database)) {
    die("Database selection failed: " . mysqli_error($conn));
}

// SQL query to create a table named 'admine' if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
// $sql = "INSERT INTO admins (username, password)
// VALUES ('admin', 'adminpassword')";


// if (mysqli_query($conn, $sql)) {
// echo "New record created successfully";
// } else {
// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

if (mysqli_query($conn, $sql)) {
   // echo "Table 'admins' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Now, you can execute your queries
// For example:
// $query = "SELECT * FROM your_table";
// $result = mysqli_query($conn, $query);

// Close the connection when you're done
// mysqli_close($conn);
?>