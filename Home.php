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


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Arcus Innovation</title>
  <link rel="stylesheet" href="./styles/styles.css" />
  <!-- <link rel="stylesheet" href="./styles/style.css" /> -->
  <link rel="stylesheet" href="./styles/lib.css" />
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"/> -->

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
   
</head>

<body>
  <div class="bodyContainer">

  <nav class="navbar navbar-expand-lg custom_nav-container ">
        <div>
          <img style="width: 100px; height: auto;" src="assets/Arcuslogo.png" alt="image">
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            
              <li class="nav-item active wow fadeInUp">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.3s">
                <a class="nav-link" href="#mission&vision">Mission & Vision <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.4s">
                <a class="nav-link" href="#projects">Our Projects<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.5s">
                <a class="nav-link" href="#objectives">Objectives<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.6s">
                <a class="nav-link" href="#values">Our Values<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.7s">
                <a class="nav-link" href="#sales">Sales<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.8s">
                <a class="nav-link" href="#team">Our Tean<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="0.9s"> 
                <a class="nav-link" href="#partners">Partnerships<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="1s">
                <a class="nav-link" href="#about">About<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active wow fadeInUp" data-wow-delay="1.1s">
                <a class="nav-link" href="#reachus">Reach Us<span class="sr-only">(current)</span></a>
              </li>
            </ul>
          </div>
        </nav>
  <section class="home">
   
      <h2 class="title wow fadeInUp">
        <span>Arcus</span><br />
        Innovation Hub
      </h2>
      <br />
      <h4 class="wow fadeInUp">
        Where innovation meets opportunity. Discover what's next with us!
        The hub offers sponsorship for student projects, a dedicated workspace with internet access, and
        organizes an annual accelerator program.
      </h4>

      <div class="exploreHolder wow fadeInUp">
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
    <section class="mission" id="mission&vision">
      <br />
      <br />
      <h2>Mission & Vision</h2>
      <br />
      <br />
      <h3>Our Mission:</h3>
      <br>
      <p class="wow fadeInUp">
        The mission of the Arcus Innovation Hub is to foster a culture of
        innovation, entrepreneurship, and industrialization in Zambia.
        <br />
        We aim to empower students and startups by providing them with the
        necessary skills, resources, mentorship, and networking
        opportunities to drive technological advancements, develop
        sustainable solutions, and contribute to the country's economic
        prosperity.
      </p>

      <div class="missionImages wow fadeInUp">
        <img src="assets\solarsystem.jpg" alt="" />
        <div class="blackCircle"></div>
        <img src="assets\electriccar2.jpg" alt="" />
      </div>
      <h3>Vision:</h3>
      <br>


      <p class="wow fadeInUp">
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
    </section>

    <section class="project" id="projects">
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
                <div class="main-image wow fadeInUp">
                  <img src="<?php echo $row['projectImage']; ?>" alt="Main Image" />
                </div>
                <img class="wow fadeInUp" data-wow-delay="0.4s" src="<?php echo $row['projectImage2']; ?>" alt="Image 2" />
                <img class="wow fadeInUp" data-wow-delay="0.7s" src="<?php echo $row['projectImage3']; ?>" alt="Image 3" />

              </div>
              <br>
              <div class="">
                <p class="wow fadeInUp">
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
    <section class="objectives" id="objectives">
      <h1>Our <span class="blue">Objectives</span></h1>
      <div id="accordion" >

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

    <section class="values" id="values">
      <h1><span class="blue">Core</span> Values</h1>
      <div class="valuesContainer">
        <p>
          <span class="wow fadeInUp" data-wow-delay="0.2s">1. Innovation</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="0.4s">2. Collaboration</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="0.6s">3. Impact</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="0.8s">4. Excellence</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="1s">5. Inclusivity 6. Growth Mindset</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="1.2s">7. Empowerment</span>
          <br />
          <span class="wow fadeInUp" data-wow-delay="1.4s">8. Sustainability</span>
        </p>

        <div class="valueImages wow fadeInUp" data-wow-delay="1s">
          <img src="assets\students (2).jpg" alt="" />
        </div>
      </div>
      <br />


      <br>
      <div class="whiteButton wow fadeInUp">
        <a href="Values.php">More Insigt On Our Values</a>
      </div>
    </section>
 

      <section class="salesSection" id="sales">
        
        <!-- Menu Start -->
      
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                   <h1 class="mb-5">Most Popular Items</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <!-- <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">


                    </ul> -->

                    <div class="tab-contentr" style="display: flex; align-items: center; flex-direction: column;">
                    <li class="whiteButton">
                          <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                            <i class="fa fa-bolt fa-2x  text-primary"></i>
                            <div class="ps-3">
                              <small class="text-body">Electric Vehicles</small>
                              <h6 class="mt-n1 mb-0">Booking and Buying</h6>
                            </div>
                          </a>
                        </li>
                   
                        <br>
                        <div id="tab-1" class="tab-pane show active fade p-0">
                          
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets\electriccar2.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Tunta Electric car</span>
                                                <span class="text-primary">K70,000</span>
                                            </h5>
                                            <small class="fst-italic">Our basic models start at K70,000 but prices increase depending on more requirements</small>
                                        </div>
                                    </div>
                                </div>
                            

                            </div>
                        </div>

                        <li class="whiteButton">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-laptop fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Arcus Devices</small>
                                    <h6 class="mt-n1 mb-0">Custom devices</h6>
                                </div>
                            </a>
                        </li>
                        <br>
                        <div id="tab-2" class="tab-pane active fade show p-0">
                        <br>
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/fabrications (2).jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Wine Bottle Cover</span>
                                                <span class="text-primary">K200</span>
                                            </h5>
                                            <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/key holders.jpg" alt="" style="width: 100px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Key holders</span>
                                                <span class="text-primary">K200</span>
                                            </h5>
                                            <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/love box.jpg" alt="" style="width: 100px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Love box</span>
                                                <span class="text-primary">K200</span>
                                            </h5>
                                            <small class="fst-italic">Nicely designed love Box for that special someone</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/desks.jpg" alt="" style="width: 100px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>School desks</span>
                                                <span class="text-primary">K2000</span>
                                            </h5>
                                            <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/brai stands (1).jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Braii Stands</span>
                                                <span class="text-primary">K800</span>
                                            </h5>
                                            <small class="fst-italic">Brai stand for homes and other places </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/fabrications (2).jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Lazer Cutting</span>
                                                <span class="text-primary">K1000</span>
                                            </h5>
                                            <small class="fst-italic">We do custom lazer cutting </small>
                                        </div>
                                    </div>
                                </div>
                               
                            
                            </div>
                        </div>
                        <!-- PCB SECTION  -->
                        
                        <li class="whiteButton">
                          <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <i class="fa fa-microchip fa-2x text-primary"></i>
                            <div class="ps-3">
                              <small class="text-body">PCBs</small>
                              <h6 class="mt-n1 mb-0">Custom made</h6>
                            </div>
                          </a>
                        </li>   
                        <br>
                        <div id="tab-3" class="tab-pane fade active show p-0">
                        <div class="row g-4">
                             
                        <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/pcb5.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Custom PCB designing </span>
                                                <span class="text-primary">K500</span>
                                            </h5>
                                            <small class="fst-italic">K500 is the starting point and the price increases with more features</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/pcbs.png" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Generic PCB Designs</span>
                                                <span class="text-primary">starting at K500</span>
                                            </h5>
                                            <small class="fst-italic">Any PCB designs for companies and individuals.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="assets/pcb3.jpg" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span>Variety PCB Designs</span>
                                                <span class="text-primary">starting at K500</span>
                                            </h5>
                                            <small class="fst-italic">We build PCB designs for companies and individuals.</small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <!-- Menu End -->
      </section>

<br>
    <section class="about" id="about">
      <h1 class="wow fadeInUp" style="z-index: 3; color: white; font-size: 56px;">
        <span class="blue"> About</span> Arcus
      </h1>
      <div class="aboutBox">
        <p class="blurBox2 wow fadeInUp">
          The Arcus Innovation Hub in Zambia is dedicated to
          fostering innovation, entrepreneurship, and
          industrialization. We provide practical
          learning opportunities, including PCB building and
          partnership development through university clubs,
          to support students and startups.
        </p>
        <p class="blurBox2 wow fadeInUp">
          This program trains and mentors startups in
          various aspects of entrepreneurship, culminating
          in a pitching event where industry leaders
          evaluate and provide feedback.
        </p>
        <p class="blurBox2 wow fadeInUp">
          By emphasizing practical work, collaboration with university clubs, and providing resources and mentorship,
          the Arcus Innovation Hub aims to create a vibrant ecosystem of innovation and empower students and startups to
          drive technological advancements and sustainable solutions.
        </p>
      </div>
      <div class="whiteButton moreAboutUs  wow fadeInUp">
        <a href="About.php">More About Us</a>
      </div>
    </section>
    <section class="team">
      <h1>Our <span class="blue">Team</span></h1>
      <div class="team-container">
        <!-- Dummy partner items (you can add more as needed) -->
        <div class="teamMember">
          <h2>Chishimba Katepa</h2>
          <img class=" img-fluid" src="assets/teamMembers/chishimba.jpeg" alt="">
<h3><span class="blue">Engineer</span></h3>
        </div>
    
      </div>
    </section>
    <section class="partners" id="partners">
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

    <section class="reach-us" id="reachus">
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
     
     <i class="bi bi-facebook"></i>
     <i class="bi bi-instagram"></i>
     <i class="bi bi-telegram"></i>
     <i class="bi bi-whatsapp"></i>
     
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

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="./js/jquery.js"></script>
<script src="./js/main.js"></script>

</html>