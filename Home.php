<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/Acrus-innovation-hub/db/config.php');


$eventsQuery = "SELECT * FROM events";
$projectsQuery = "SELECT * FROM projects";

$events = mysqli_query($conn, $eventsQuery);
$projects = mysqli_query($conn, $projectsQuery);





if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['names']) && isset($_POST['organizationName']) && isset($_POST['email']) && isset($_POST['message'])) {


  $names = $_POST['names'];
  $organizationName = $_POST['organizationName'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // SQL query to insert the hashed password and salt
  $sql = "INSERT INTO messages (names, organizationName, email, message) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('ssss', $names, $organizationName, $email, $message);

  if ($stmt->execute()) {
    // echo "Message Sent";
  } else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
  }
} else {
  echo "something went wrong";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Arcus Innovation</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <link rel="stylesheet" href="./styles/lib.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <div class="bodyContainer">
    <!-- start section -->
    <section class="home">
      <nav class="navigation-menu js-nav-menu">
        <div class="navigation-menu__toggle js-nav-menu-toggle">
          <span class="navigation-menu__bars"></span>
        </div>
        <ul class="menu-list">
          <div class="menu-list__item">Mission & Vision</div>
          <div class="menu-list__item">Our Project</div>
          <div class="menu-list__item">Objective</div>
          <div class="menu-list__item">Core Value</div>
          <div class="menu-list__item">About</div>
          <div class="menu-list__item">Reach Us</div>
        </ul>
      </nav>
      <h2>
        <span>Arcus</span><br />
        Innovation Hub
      </h2>
      <br />
      <h4>
        Where innovation meets opportunity. Discover what's next with us!
      </h4>

      <div class="whiteButton">explore</div>

      <div class="homeMain">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">

            <?php
            if ($events->num_rows >= 1) {
              $firstItem = true; // Initialize a flag to track the first item
              while ($row = $events->fetch_assoc()) {
                ?>
                <div class="carousel-item <?php echo $firstItem ? 'active' : ''; ?>">
                  <div class="carousel-content">
                    <h2>
                      <?php echo $row['eventTitle']; ?>
                    </h2>
                    <div class="imageHolder">
                      <img src="<?php echo $row['eventImage']; ?>" alt="image" />
                    </div>
                    <p>
                      <?php echo $row['eventDescription']; ?>
                    </p>
                  </div>
                </div>
                <?php
                $firstItem = false; // Set the flag to false after the first item
              }
            } else {
              echo "No events found";
            }
            ?>


          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- mission secttion -->
    <section class="mission">
      <br />
      <br />
      <h2>Mission & Vision</h2>
      <br />
      <br />
      <h3>Our Mission:</h3>
      <div class="content-container">
        <p>
          The mission of the Arcus Innovation Hub is to foster a culture of
          innovation, entrepreneurship, and industrialization in Zambia.
          <br />
          We aim to empower students and startups by providing them with the
          necessary skills, resources, mentorship, and networking
          opportunities to drive technological advancements, develop
          sustainable solutions, and contribute to the country's economic
          prosperity.
        </p>
        <div class="read-more-button">
          <span class="material-symbols-outlined">
            keyboard_double_arrow_down
          </span>
        </div>
      </div>
      <div class="missionImages">
        <img src="assets\solarsystem.jpg" alt="" />
        <img src="assets\electriccar2.jpg" alt="" />
      </div>
      <h3>Vision:</h3>
      <div class="content-container">
        <p>
          Our vision is to become a leading innovation hub in Zambia,
          recognized for driving technological advancements, nurturing
          entrepreneurial talent, and supporting startups in developing
          sustainable solutions. We envision a future where the Arcus
          Innovation Hub plays a pivotal role in transforming ideas into
          marketable products, contributing to Zambia's industrialization,
          economic growth, and global competitiveness.
        </p>

        <div class="read-more-button">
          <span class="material-symbols-outlined">
            keyboard_double_arrow_down
          </span>
        </div>
      </div>
    </section>
    <section class="project">

      <h2>Our Projects</h2>


      <?php
      if ($projects->num_rows >= 1) {
        // Initialize a flag to track the first item
        while ($row = $projects->fetch_assoc()) {
          ?>
          <div class="firstSection">
            <div>
              <h3>
                <?php echo $row['projectTitle']; ?>
              </h3>
              <div>
              <img src="<?php echo $row['projectImage']; ?>" alt="image" />

            </div>
              <div class="content-container">
                <p>
                  <?php echo $row['projectDescription']; ?>
                </p>
                <div class="read-more-button">
                  <span class="material-symbols-outlined">
                    keyboard_double_arrow_down
                  </span>
                </div>
              </div>
            </div>
           
          </div>

          <?php
          $firstItem = false; // Set the flag to false after the first item
        }
      } else {
        echo "No projects found";
      }
      ?>

    </section>

    <!-- objectives section -->
    <section class="objectives">
      <h1>Our Objectives</h1>
      <div>
        <div class="content-container">
          <p>
            1. To provide practical learning experiences and hands-on training
            to students, enabling them to develop technical skills and
            innovative problem-solving capabilities.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
        <br />
        <div class="content-container">
          <p>
            2. To support university clubs and facilitate cross-disciplinary
            collaboration, fostering an environment that nurtures creativity
            and entrepreneurial thinking.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
        <br />
        <div class="content-container">
          <p>
            3. To sponsor student projects and provide a dedicated workspace
            equipped with the tools and resources required for prototyping and
            product development.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
        <br />
        <div class="content-container">
          <p>
            4. To organize an annual accelerator program that trains and
            mentors startups in entrepreneurship, helping them build
            successful and sustainable businesses.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
        <br />
        <div class="content-container">
          <p>
            5. To create a strong mentorship network that connects startups
            with experienced professionals, offering personalized guidance and
            advice.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
        <br />
        <div class="content-container">
          <p>
            6. To encourage the development of innovative technologies, with a
            specific focus on electric cars and other sustainable solutions.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>

        <div class="content-container">
          <p>
            7. To forge strategic partnerships with universities, industries,
            other innovation hubs and governmental organizations to leverage
            additional resources and expertise.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>

        <div class="content-container">
          <p>
            8. To evaluate and improve the effectiveness of our programs
            continuously, ensuring their relevance and impact on the startup
            ecosystem.
          </p>
          <div class="read-more-button">
            <span class="material-symbols-outlined">
              keyboard_double_arrow_down
            </span>
          </div>
        </div>
      </div>
    </section>
    <section class="values">
      <h1>Our Core Values</h1>
      <div>
        <p>
          1. Innovation
          <br />
          2. Collaboration
          <br />
          3. Impact
          <br />
          4. Excellence
          <br />
          5. Inclusivity 6. Growth Mindset
          <br />
          7. Empowerment
          <br />
          8. Sustainability
        </p>
      </div>
      <div class="valueImages">
        <img src="assets\electriccar2.jpg" alt="" />
      </div>
      <br />
      <div class="whiteButton">
        <a href="/CoreValues.html">Expolore Our Values</a>
      </div>
    </section>

    <section class="about">
      <h2>About</h2>
      <h3>Arcus Innovation Hub</h3>
      <p>
        The Arcus Innovation Hub in Zambia is dedicated to fostering
        innovation, entrepreneurship, and industrialization.
      </p>
      <div class="whiteButton moreAboutUs">
        <a href="/About.html">More About Us</a>
      </div>
    </section>
    <section class="reach-us">
      <h2>Contact Us</h2>

      <div class="contactForm">
        <h3>Reach Out To Us</h3>
        <form method="post">
          <div class="form-group names">
            <input type="text" class="form-control" id="name" name="names" placeholder="Names" required />
            <input type="text" class="form-control" id="name" placeholder="Company or Organization"
              name="organizationName" required />
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
          </div>
          <div class="form-group">
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message"
              required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="linksBand">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-telegram"></i>
        <i class="fa fa-whatsapp"></i>
      </div>
      <br>
      <br>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <h4>est. 2020</h4>
    </section>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script defer src="./js/jquery.js"></script>
<script defer src="./js/main.js"></script>

</html>