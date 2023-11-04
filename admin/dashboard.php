<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tayantpay Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../styles/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="../styles/admin.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div
        id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
      >
        <div
          class="spinner-border text-primary"
          style="width: 3rem; height: 3rem"
          role="status"
        >
          <span class="sr-only">Loading...</span>
        </div>
      </div> -->
        <!-- Spinner End -->



        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <!-- <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                </a> -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <!-- <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
                        <i class="fa fa-user me-4"></i>
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>

                </div>
                <div class="navbar-nav w-100">
                    <br>
                    <br>
                    <br>
                    <a href="/" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="viewScripts/projects.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Projects</a>
                    <a href="viewScripts/events.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Events</a>
                    <a href="viewScripts/messages.php" class="nav-item nav-link"><i class="fa fa-bell me-2"></i></i>Messages</a>
                    <hr>
                    <a href="/#" class="nav-item nav-link"><i class="fa fa-power-off me-2"></i>Logout</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->





        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a class="logo" href="/" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="../assets/ArcusLogo.png" height="50" width="30" alt="">
                </a>

                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">


                    <div class="nav-item dropdown">
                        <a href="#" class="sidebar-toggler flex-shrink-0">
                            <i class="fa fa-bars"></i>
                        </a>

                    </div>
                </div>
            </nav>
            <!-- Navbar End -->



            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-2">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="optionsContainer">
                            <span class="">
                                <a href="./viewScripts/events.php">View Events</a>
                            </span>
                            <span class="" id="events">Events</span>
                            <span class="">
                                <a href="./uploadScripts/upload_event.php">Upload Event</a>
                            </span>
                        </div>
                        <div class="optionsContainer">

                            <span class="">
                                <a href="./viewScripts/projects.php">View Projects</a>
                            </span>
                            <span class=" " id="projects">Projects</span>
                            <span class="">
                                <a href="./uploadScripts/upload_project.php">Upload Project</a>
                            </span>
                        </div>

                        <div class="optionsContainer">
                            <span class="">
                                <a href="./viewScripts/messages.php">View Messages</a>
                            </span>
                            <span class="" id="">Messages</span>
                            <span class="">
                                <a href="./uploadScripts/publish_message.php">Publish Message</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Message Modals -->


            <!-- Message Modals End -->


            <!-- Notification Modals -->



            <!-- Notification Modals End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 footer">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Arcus Innovation</a>, All Right Reserved.
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->

    <!-- Back to Top -->

    </div>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/chart/chart.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/waypoints/waypoints.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Template Javascript -->
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script defer src="../js/admin.js"></script>

    <script>
        


  (function ($) {
    "use strict";

    // Spinner
    // var spinner = function () {
    //     setTimeout(function () {
    //         if ($('#spinner').length > 0) {
    //             $('#spinner').removeClass('show');
    //         }
    //     }, 1000);
    // };
    // spinner();
    // $('#spinner').removeClass('show');
    

    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    // $('.pg-bar').waypoint(function () {
    //     $('.progress .progress-bar').each(function () {
    //         $(this).css("width", $(this).attr("aria-valuenow") + '%');
    //     });
    // }, {offset: '80%'});



   
})(jQuery);


        $(document).ready(function () {
            // Get the current URL path
            var currentPath = window.location.pathname;
            console.log(currentPath)

            // Remove the leading and trailing slashes
            currentPath = currentPath.replace(/^\/|\/$/g, '');
            console.log(currentPath)


            // Loop through each navigation link
            $(".navbar-nav a.nav-link").each(function () {
                // Get the href attribute of the link
                var linkHref = $(this).attr("href");

                // Remove the leading and trailing slashes from the link's href
                linkHref = linkHref.replace(/^\/|\/$/g, '');
                console.log(linkHref);

                // Check if the link's href matches the current path
                if (currentPath === linkHref) {
                    // Add the 'active' class to the matching link
                    $(this).addClass("active");
                } else {
                    $(this).removeClass("active");
                }
            });
        });
    </script>
</body>

</html>