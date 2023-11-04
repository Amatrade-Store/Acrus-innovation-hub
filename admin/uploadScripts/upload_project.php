
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arcus Adminstrator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../styles/admin.css">
    <link href="../../styles/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
<nav class="navbar navbar-expand navbar-dark sticky-top px-4 py-0">
                <a class="logo" href="/" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="../../assets/ArcusLogo.png" height="50" width="30" alt="">
                </a>
            </nav>
    <section>
    <h3><a href="../dashboard.php">&leftarrow;</a>
        </h3>
    <h2>Upload Project</h2>

<form method="post" class="column" action="project.php" enctype="multipart/form-data">
<input placeholder="project title" type="text" name="title" id="title" required>
  
    <input class="hide" type="file" name="image" id="image" accept="image/*" required>
    <label class="whiteButton" for="image">upload image (Main)</label>
    <input class="hide" type="file" name="image2" id="image2" accept="image/*" required>
    <label class="whiteButton" for="image2">upload image (left)</label>
    <input class="hide" type="file" name="image3" id="image3" accept="image/*" required>
    <label class="whiteButton" for="image3">upload image (right)</label>
    <textarea rows="20" cols="30" class="textInput" type="text" name="description" placeholder="enter description" required></textarea>
    <button class="upload-button" type="submit">Upload Project</button>
</form>

    </section>
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
