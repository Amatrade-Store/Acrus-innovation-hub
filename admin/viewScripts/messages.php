

<?php
session_start(); // Start a session

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');

$query = "SELECT * FROM messages";

$result = mysqli_query($conn, $query);

// $messageTableSQL = "CREATE TABLE IF NOT EXISTS messages (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     names VARCHAR(255) NOT NULL,
//     organizationName VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     message TEXT NOT NULL
// )";

// // Execute the SQL table creation query
// if ($conn->query($messageTableSQL) === TRUE) {
//     echo "Table 'messages' created successfully.";
// } else {
//     echo "Error creating table: " . $conn->error;
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcus Adminstrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/admin.css">
    <link rel="stylesheet" href="../../styles/bootstrap.min.css">
    
</head>

<body>

<nav class="navbar navbar-expand navbar-dark sticky-top px-4 py-0">
                <a class="logo" href="/" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="../../assets/ArcusLogo.png" height="50" width="30" alt="">
                </a>
            </nav>
            <h3><a href="../dashboard.php">&leftarrow;</a>
        </h3>
        <h2>Messages</h2>
        <div class="scrollable scrollableMax">

        <?php
        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div>
                    <div class="white-container">
                       <div>
                       <p><strong>Name:</strong> <?php echo $row['names']; ?></p>
                        <p><strong>Organization Name:</strong> <?php echo $row['organizationName']; ?></p>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Message:</strong> <?php echo $row['message']; ?></p>
                        <form action="deleteScripts/delete_message.php" method="post">
                            <!-- Include a hidden input for message ID if you want to delete messages -->
                            <input type="hidden" name="messageId" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form> 
                       </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No messages found";
        }
        ?>
        
    </div>
    <div class="container-fluid pt-4 px-4 footer">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Arcus Innovation</a>, All Right Reserved.
                        </div>

                    </div>
                </div>
            </div>
</body>


<script src="../js/admin.js"></script>

<!-- Add Bootstrap JS scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
