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
}


?>
<!-- <ul class="menu-list">
          <div class="menu-list__item">Mission & Vision</div>
          <div class="menu-list__item">Our Project</div>
          <div class="menu-list__item">Objective</div>
          <div class="menu-list__item">Core Value</div>
          <div class="menu-list__item">About</div>
          <div class="menu-list__item">Reach Us</div>
        </ul> -->

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
  <link rel="stylesheet" href="./styles/Ncss/bootstrap.css">
</head>

<body>
  <div class="bodyContainer">
    <br>
<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="">logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Add links to gallery, events, and contact sections -->
                <li class="nav-item">
                    <a href="../Home.php"> Home</a>
                </li>
                <li class="nav-item">
                    <a href="Help.php">Mission & Vision</a>
                </li>
                <li class="nav-item">
                <a href="">Projects</a>
                </li>
                <li class="nav-item">
<a href="">                    Objectives</a>                </li>
                <li class="nav-item">
                    <a href="">Values</a>
                </li>
                <li class="nav-item">
                    <a href="">About</a>
                </li>
                <li class="nav-item">
                    <a href="">Partners & Sponsors</a>
                </li> 
                <li class="nav-item">
                    <a href="">Contact Us</a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- start section -->

    </section>
    <section class="home">


      <h2 class="title">
        <span>Arcus</span><br />
        Innovation Hub
      </h2>
      <br />
      <h4>
        Where innovation meets opportunity. Discover what's next with us!
        The hub offers sponsorship for student projects, a dedicated workspace with internet access, and
        organizes an annual accelerator program.
      </h4>

      <div class="exploreHolder">
        <div class="whiteButton">Explore</div>

      </div>
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
      <br>
      <p class="blurBox">
        The mission of the Arcus Innovation Hub is to foster a culture of
        innovation, entrepreneurship, and industrialization in Zambia.
        <br />
        We aim to empower students and startups by providing them with the
        necessary skills, resources, mentorship, and networking
        opportunities to drive technological advancements, develop
        sustainable solutions, and contribute to the country's economic
        prosperity.
      </p>

      <div class="missionImages">
        <img src="assets\solarsystem.jpg" alt="" />
        <div class="blackCircle"></div>
        <img src="assets\electriccar2.jpg" alt="" />
      </div>
      <h3>Vision:</h3>
      <br>

      <div class="">
        <p class="blurBox">
          Our vision is to become a leading innovation hub in Zambia,
          recognized for driving technological advancements, nurturing
          entrepreneurial talent, and supporting startups in developing
          sustainable solutions.
          <br>
          We envision a future where the Arcus
          Innovation Hub plays a pivotal role in transforming ideas into
          marketable products, contributing to Zambia's industrialization,
          economic growth, and global competitiveness.
        </p>

      </div>
    </section>
    <section class="project">

      <h2> <span class="blue">Our</span> Projects</h2>


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
              <div class="image-grid">
                <div class="main-image">
                  <img src="<?php echo $row['projectImage']; ?>" alt="Main Image" />
                </div>
                <img src="<?php echo $row['projectImage2']; ?>" alt="Image 2" />
                  <img src="<?php echo $row['projectImage3']; ?>" alt="Image 3" />
                
              </div>
              <br>
              <div class="">
                <p class="blurBox">
                  <?php echo $row['projectDescription']; ?>
                </p>
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
      <h1>Our <span class="blue">Objectives</span></h1>
      <div id="accordion">

        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseOne">
                Provide practical learning experiences
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              We provide practical learning experiences and hands-on training
              to students, enabling them to develop technical skills and
              innovative problem-solving capabilities.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                aria-controls="collapseTwo">
                Support university clubs
              </button>
            </h5>
          </div>

          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              To support university clubs and facilitate cross-disciplinary
              collaboration, fostering an environment that nurtures creativity
              and entrepreneurial thinking.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
                aria-controls="collapseThree">
                Sponsor Student Projects
              </button>
            </h5>
          </div>

          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              To sponsor student projects and provide a dedicated workspace
              equipped with the tools and resources required for prototyping and
              product development.
            </div>
          </div>
        </div>



        <div class="card">
          <div class="card-header" id="headingFour">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
                aria-controls="collapseFour">
                Organize an annual accelerator program
              </button>
            </h5>
          </div>

          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body">
              To organize an annual accelerator program that trains and
              mentors startups in entrepreneurship, helping them build
              successful and sustainable businesses.
            </div>
          </div>
        </div>




        <div class="card">
          <div class="card-header" id="headingFive">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
                aria-controls="collapseFive">
                Create Strong Mentorship Network
              </button>
            </h5>
          </div>

          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body">
              To create a strong mentorship network that connects startups
              with experienced professionals, offering personalized guidance and
              advice.
            </div>
          </div>
        </div>



        <div class="card">
          <div class="card-header" id="headingSix">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseSix" aria-expanded="true"
                aria-controls="collapseSix">
                Encourage The Development Of Innovative Technologies
              </button>
            </h5>
          </div>

          <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body">
              To encourage the development of innovative technologies, with a
              specific focus on electric cars and other sustainable solutions.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingSeven">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true"
                aria-controls="collapseSeven">
                Forge Strategic Partnerships
              </button>
            </h5>
          </div>

          <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body">
              7. To forge strategic partnerships with universities, industries,
              other innovation hubs and governmental organizations to leverage
              additional resources and expertise.
            </div>
          </div>
        </div>


        <div class="card">
          <div class="card-header" id="headingEight">
            <h5 class="mb-0">
              <button data-toggle="collapse" data-target="#collapseEight" aria-expanded="true"
                aria-controls="collapseEight">
                Evaluate And Improve Effectiveness Of Our Programs
              </button>
            </h5>
          </div>

          <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
            <div class="card-body">
              8. To evaluate and improve the effectiveness of our programs
              continuously, ensuring their relevance and impact on the startup
              ecosystem.
            </div>
          </div>
        </div>


      </div>
    </section>

    <section class="values">
      <h1><span class="blue">Core</span> Values</h1>
      <div class="valuesContainer">
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

        <div class="valueImages">
          <img src="assets\electriccar2.jpg" alt="" />
        </div>
      </div>
      <br />


      <br>
      <div class="whiteButton">
        <a href="Values.php">Expolore Our Values</a>
      </div>
    </section>

    <section class="about">
      <h1 style="z-index: 3; color: white; font-size: 56px;">
        <span class="blue"> About</span> Arcus
      </h1>
      <div class="aboutBox">
        <p class="blurBox">
          The Arcus Innovation Hub in Zambia is dedicated to
          fostering innovation, entrepreneurship, and
          industrialization. We provide practical
          learning opportunities, including PCB building and
          partnership development through university clubs,
          to support students and startups.
        </p>
        <p class="blurBox">
          This program trains and mentors startups in
          various aspects of entrepreneurship, culminating
          in a pitching event where industry leaders
          evaluate and provide feedback.
        </p>
        <p class="blurBox">
          By emphasizing practical work, collaboration with university clubs, and providing resources and mentorship,
          the Arcus Innovation Hub aims to create a vibrant ecosystem of innovation and empower students and startups to
          drive technological advancements and sustainable solutions.
        </p>
      </div>
      <div class="whiteButton moreAboutUs">
        <a href="About.php">More About Us</a>
      </div>
    </section>

    <section class="partners">
    <h1> <span class="blue">Partners &</span> Sponsers</h1>
      <div class="partners-container">
    <!-- Dummy partner items (you can add more as needed) -->
    <div class="partner">
      <img src="https://eizcbusc.com/img/CBU.png" alt="Partner 1">
    
    </div>
    <div class="partner">
      <img src="https://eizcbusc.com/img/icon.png" alt="Partner 2">
     
    </div>
    <div class="partner">
      <img src="https://eizcbusc.com/img/roboticscbu.jpg" alt="Partner 3">
   
    </div>
    <div class="partner">
      <img src="https://eizcbusc.com/img/roboticscbu.jpg" alt="Partner 3">
      
    </div>
    <div class="partner">
      <img src="https://eizcbusc.com/img/roboticscbu.jpg" alt="Partner 3">
  
    </div>
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
      <br>

      <h3 style="width:100%; text-align: center;">Contact Information</h3>
      <br>
      <div class="col-md-3">
        <ul class="list-unstyled">
          <li><i class="fa fa-map-marker-alt"></i> Arcus Innovation Hub, Kitwe Zambia.</li>
          <li><i class="fa fa-phone"></i> +260960616121</li>
          <li><i class="fa fa-envelope"></i> arcushub@gmail.com</li>
        </ul>
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
      <p class="text-center">© ARCUS INNOVATION HUB. All rights reserved.</p>

    </section>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- <script src="./js/bootstrap.js"></script> -->
<script src="./js/jquery-3.4.1.min.js"></script>
<script defer src="./js/jquery.js"></script>
<script defer src="./js/main.js"></script>

</html>