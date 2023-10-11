

<?php
session_start(); // Start a session

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');


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
        <a class="navbar-brand" href="../dashboard.php">Adminstrator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Add links to gallery, events, and contact sections -->
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
  <!-- Event upload form -->
  <h2>Upload Event</h2>

<form method="post" action="event.php" enctype="multipart/form-data">
    <input placeholder="event title" type="text" name="title" id="title" required>
    <input class="hide" type="file" id="image" name="image" accept="image/*" required>
    <label class="whiteButton" for="image">upload image</label>
    <textarea rows="30" cols="30" class="textInput" type="text" name="description" placeholder="enter description" required></textarea>
    <button class="upload-button" type="submit">Upload Event</button>
</form>
    </section>
</body>


<script src="../../../js/admin.js"></script>

<!-- Add Bootstrap JS scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
