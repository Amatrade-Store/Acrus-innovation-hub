

<?php
session_start(); // Start a session

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');

$query = "SELECT * FROM projects";

$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcus Adminstrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/admin.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="dashboard.php">Adminstrator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Add links to gallery, projects, and contact sections -->
                <li class="nav-item">
                    <a href="../../Home.php"> Home</a>
                </li>
                <li class="nav-item">

                    <a href="Help.php">Help</a>
                </li>
                <li class="nav-item">
                    About
                </li>
                <li class="nav-item">
                    <a href="../authScripts/logout.php" class="btn red">Logout</a> <!-- Add a logout button -->
                </li>
            </ul>
        </div>
    </nav>
    <section>
    <h3><a href="../dashboard.php">&leftarrow;</a>
        </h3>
<h2>Projects</h2>
        <div class="scrollable scrollableMax">

        <?php
        if ($result->num_rows >= 1) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div>
                    <div class="white-container">
                        <p><strong>Project Title:</strong> <?php echo $row['projectTitle']; ?></p>
                        <img class="item-image" src="<?php echo $row['projectImage']; ?>" alt="">
                        <img class="item-image" src="<?php echo $row['projectImage2']; ?>" alt="">
                        <img class="item-image" src="<?php echo $row['projectImage3']; ?>" alt="">
                    
                        <p><strong>Project Description:</strong> <?php echo $row['projectDescription']; ?></p>

                        <form action="../deleteScripts/delete_project.php" method="post">
                            <!-- Include a hidden input for message ID if you want to delete messages -->
                            <input type="hidden" name="projectId" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No messages found";
        }
        ?>
        </div>
    </section>
</body>


<script src="../js/admin.js"></script>

<!-- Add Bootstrap JS scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
