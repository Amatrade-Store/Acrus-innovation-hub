<?php
session_start(); // Start a session

// Include the database configuration
include_once($_SERVER['DOCUMENT_ROOT'] . '/arcus/db/config.php');

// Hardcoded admin username and password for testing (replace with your actual admin credentials)
$adminUsername = 'admin';
$adminPassword = 'adminpassword';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $adminUsername && $password === $adminPassword) {
        // Authentication successful, set a session variable to indicate admin login
        $_SESSION['is_admin'] = true;
        $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = "adminId";
                    $_SESSION['username'] = "admin";
        header('Location: /arcus/admin/dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: /arcus/admin/dashboard.php'); // Redirect to the dashboard
    exit();
}



// Check if the login form is submitted
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Query to retrieve user data from the database
//     $sql = "SELECT id, username, password FROM admins WHERE username = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param('s', $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows == 1) {
//         $row = $result->fetch_assoc();

//         // Verify the password
//         if (password_verify($password, $row['password'])) {
//             // Password is correct, set session variables
//             $_SESSION['loggedin'] = true;
//             $_SESSION['user_id'] = $row['id'];
//             $_SESSION['username'] = $row['username'];

//             header('Location: /arcus/admin/dashboard.php'); // Redirect to the dashboard
//             exit();
//         } else {
//             $error = "Invalid password";
//         }
//     } else {
//         $error = "Invalid username";
//     }
//     $stmt->close();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../styles/auth.css">

</head>
<body>

  

    <form method="post" action="">
       
    <h2>Admin Login</h2>
<div class="error" style="text-align: center;font-size:20px;">
    <?php
    if (isset($error)) {
        echo '<p style="color: red;">' . $error . '</p>';
    }
    ?>
</div>
  
                
                <input type="text" id="username" name="username" placeholder="User Name" required>
    
            
                <input type="password" id="password" name="password" placeholder="Password" required>

        <!-- <input type="password" id="password" name="password" required><br> -->
        <button class="login-button" type="submit" value="Login">Login</button>
        <!-- <input type="submit" value="Login"> -->
    </form>

</body>
</html>
