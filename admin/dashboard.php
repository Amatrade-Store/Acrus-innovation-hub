<?php
session_start(); // Start a session

// include_once($_SERVER['DOCUMENT_ROOT'] . '/arcus/admin/db/config.php');

// // Fetch contact messages from the database
// $query = "SELECT name, email, number, message FROM contact_messages";
// $result = $conn->query($query);

// // Fetch event data from JSON
// $eventData = getEventData();
// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Redirect to the login page
    exit();
}


// Handle image deletion
if (isset($_POST['delete']) && file_exists($_POST['delete'])) {
    unlink($_POST['delete']);
    $success = "Image deleted successfully.";
}


//event 

// Function to fetch event data from JSON file


// Handle image uploads
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && isset($_POST['description'])) {
    $uploadedFile = $galleryDirectory . basename($_FILES['image']['name']);
    $uploadOk = 1; // Flag to check if the upload was successful

    // Check if the image file is a real image or a fake image
    // if (getimagesize($_FILES['image']['tmp_name']) === false) {
    //     $error = "Invalid image file.";
    //     $uploadOk = 0;
    // }

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
            // File uploaded successfully
            $success = "Image uploaded successfully.";

            // Save event data (image path and description) to JSON
            $eventData = getEventData();
            $eventData[] = ['image' => $uploadedFile, 'description' => $_POST['description']];
            file_put_contents($eventsFile, json_encode($eventData, JSON_PRETTY_PRINT));
        } else {
            $error = "Error uploading image.";
        }
    }
}

// Handle event deletion
if (isset($_POST['delete']) && isset($_POST['eventIndex'])) {
    $eventIndex = $_POST['eventIndex'];
    $eventData = getEventData();

    if (array_key_exists($eventIndex, $eventData)) {
        // Remove the event data
        unset($eventData[$eventIndex]);

        // Re-index the array
        $eventData = array_values($eventData);

        // Save updated event data to JSON
        file_put_contents($eventsFile, json_encode($eventData, JSON_PRETTY_PRINT));

        // Delete the event image file
        if (file_exists($eventData[$eventIndex]['image'])) {
            unlink($eventData[$eventIndex]['image']);
        }

        $success = "Event deleted successfully.";
    } else {
        $error = "Invalid event index.";
    }
}
///contact message 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcus Adminstrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/admin.css">
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
                <!-- Add links to gallery, events, and contact sections -->
                <li class="nav-item">
                    <a href="../Home.php"> Home</a>
                </li>
                <li class="nav-item">

                    <a href="Help.php">Help</a>
                </li>
                <li class="nav-item">
                    About
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="btn red">Logout</a> <!-- Add a logout button -->
                </li>
            </ul>
        </div>
    </nav>
    <?php if (!empty($success)): ?>
        <div style="color: green;">
            <?php echo $success; ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div style="color: red;">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <div class="optionsContainer">
        <span class="screenButton" id="events">Events</span>
        <span class="screenButton" id="projects">Projects</span>
        <span class="screenButton" id="messages">Messages</span>
    </div>

    <section class="screen" id="events">
        <div class="backButton">&times;</div>


        <!-- Event upload form -->
        <h2>Upload</h2>

        <form method="post" action="" enctype="multipart/form-data">

            <input class="hide" type="file" name="image" accept="image/*" required>
            <label for="image">upload image</label>
            <input class="textInput" type="text" name="description" placeholder="enter description" required>
            <button class="upload-button" type="submit">Upload Event</button>
        </form>

        <h2>Events</h2>
        <br>
        <div class="scrollable">
            <div>
                <div class="event-container">
                    <img class="event-image" src="event-image.jpg" alt="Event Image">
                    <div class="event-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <button class="delete-button">Delete</button>
                </div>
            </div>
        </div>

        <!-- Display uploaded events with descriptions and delete buttons -->


    </section>

    <section class="screen" id="projects">
        <div class="backButton">&times;</div>


        <!-- Event upload form -->
        <h2>Upload</h2>

        <form method="post" action="" enctype="multipart/form-data">

            <input class="hide" type="file" name="image" accept="image/*" required>
            <label for="image">upload image</label>
            <input class="textInput" type="text" name="description" placeholder="enter description" required>
            <button class="upload-button" type="submit">Upload Event</button>
        </form>

        <h2>Projects</h2>
        <br>
        <div class="scrollable">
            <div>
                <div class="event-container">
                    <img class="event-image" src="event-image.jpg" alt="Event Image">
                    <div class="event-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <button class="delete-button">Delete</button>
                </div>
            </div>
        </div>

    </section>

    <section class="screen" id="messages">
        <div class="backButton">&times;</div>


        <!-- Message publish form -->
        <h1>Arcus Messages</h1>
        <h2>Publish A Message</h2>
        <form class="messageForm" method="post" action="" enctype="multipart/form-data">

            <textarea class="textInput" type="text" name="publicMessage" placeholder="Enter Message"
                required></textarea>
            <button class="upload-button" type="submit">Send</button>
        </form>

        <h2>Messages</h2>
        <div class="scrollable">

            <div>
                <div class="event-container">
                    <img class="event-image" src="event-image.jpg" alt="Event Image">
                    <div class="event-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <button class="delete-button">Delete</button>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/admin.js"></script>

    <!-- Add Bootstrap JS scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>