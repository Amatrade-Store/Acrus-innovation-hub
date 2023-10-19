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

// Creating SQL query tables
  
$adminTableSQL = "CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$messageTableSQL = "CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    names VARCHAR(255) NOT NULL,
    organizationName VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
)";

$eventsTableSQL = "CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    eventTitle VARCHAR(255) NOT NULL,
    eventImage TEXT NOT NULL,
    eventDescription TEXT NOT NULL
)";

$projectsTableSQL = "CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    projectTitle VARCHAR(255) NOT NULL,
    projectImage TEXT NOT NULL,
    projectImage2 TEXT NOT NULL,
    projectImage3 TEXT NOT NULL,
    projectDescription TEXT NOT NULL
)";

// Execute the SQL table creation query
if ($conn->query($projectsTableSQL) === TRUE) {
  //  echo "Table 'messages' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}


// Execute the events table creation query
if ($conn->query($eventsTableSQL) === TRUE) {
  //  echo "Table 'messages' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

//messages table 
if (mysqli_query($conn, $messageTableSQL)) {
    // echo "Table 'admins' created successfully";
 } else {
     echo "Error creating table: "+ $messageTableSQL . mysqli_error($conn);
 }
 // admins table
if (mysqli_query($conn, $adminTableSQL)) {
   // echo "Table 'admins' created successfully";
} else {
    echo "Error creating table: "+ $adminTableSQL . mysqli_error($conn);
}

//projects table

// $sqlll = "DROP TABLE projects";

// if (mysqli_query($conn, $sqlll)) {
// echo "deleted admins successfully";
// } else {
// echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);
// }


// $username = "admin";
// $password = "adminpassword";

// // Generate a random salt
// $salt = bin2hex(random_bytes(16)); // 16 bytes is a common size for salts

// // Hash the password with the salt using bcrypt
// $hashedPassword = password_hash($password . $salt, PASSWORD_BCRYPT);

// // SQL query to insert the hashed password and salt
// $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('ss', $username, $hashedPassword);

// if ($stmt->execute()) {
//     echo "New Admin created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $stmt->error;
// }

// Now, you can execute your queries
// For example:
// $query = "SELECT * FROM your_table";
// $result = mysqli_query($conn, $query);

// Close the connection when you're done
// mysqli_close($conn);
?>