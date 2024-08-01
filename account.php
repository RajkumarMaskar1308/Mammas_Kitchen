<?php
include_once('connection.php');
if($_SESSION['tiffin_id']=="")
{    
    echo "<script>alert('Book First');</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mumma's kitchen</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    
     <!-- Favicon -->
     <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
   
   
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  color:white;
  margin-left: 4px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}


#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  color: white;
}
h5{
    color:white;
}
</style>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
       <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Mumma's kitchen</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <!-- <a href="service.php" class="nav-item nav-link">Service</a> -->
                        <a href="menu.php" class="nav-item nav-link">Menu</a>
                        
                        <a href="booking.php" class="nav-item nav-link">Booking</a>
                        <a href="team.php" class="nav-item nav-link">Our Team</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="account.php" class="nav-item nav-link active">Account</a>
                <!--   </div>
                    <a href="" class="btn btn-primary py-2 px-4">Book A Table</a>
                </div>-->
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">TimeTable</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        
        <!-- Reservation Start--> 
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">  
                <div class="col-md-12 bg-dark d-flex align-items-center">
                    <div class="p-12 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal"></h5><br>
                        
                       
                        <?php
                       $sql="select * from booking where user_id='$_SESSION[tiffin_id]' ";
                       $query=mysqli_query($conn,$sql);
                            $row=mysqli_fetch_row($query);

                                $b=$row[2];
                                $l=$row[3];
                                $d=$row[4];
                                $status=$row[8];
                                echo "<a href='refill.php?id=$row[0]' class='btn btn-primary' style='margin-left:80%;'>Refill</a>
                                <h1 class='text-white mb-4'>Your Meal </h1>";
                                echo "<h5>Your Tiffin Status ".$status."</h5>";
                                echo "<table id='customers'>";
                                echo "<tr>";
                                echo " <th></th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th><th>Sunday</th>";
                                echo "</tr>";
                                echo "<tr><h1 style='font-size:20px;color:white;margin-left:250px;'>You Booked On : $row[7]<br></h1></tr>";
                                echo "";
                            if($b!="" && $l!="" && $d!="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {
                                    echo "<tr>";
                                    echo "<th>Breakfast</th>";
                                    echo "<td>$row[1]</td>";
                                    echo "<td>$row[2]</td>";
                                    echo "<td>$row[3]</td>";
                                    echo "<td>$row[4]</td>";
                                    echo "<td>$row[5]</td>";
                                    echo "<td>$row[6]</td>";
                                    echo "<td>$row[7]</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th>Lunch</th>";
                                    echo "<td>$row[8]</td>";
                                    echo "<td>$row[9]</td>";
                                    echo "<td>$row[10]</td>";
                                    echo "<td>$row[11]</td>";
                                    echo "<td>$row[12]</td>";
                                    echo "<td>$row[13]</td>";
                                    echo "<td>$row[14]</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<th>Dinner</th>";
                                    echo "<td>$row[15]</td>";
                                    echo "<td>$row[16]</td>";
                                    echo "<td>$row[17]</td>";
                                    echo "<td>$row[18]</td>";
                                    echo "<td>$row[19]</td>";
                                    echo "<td>$row[20]</td>";
                                    echo "<td>$row[21]</td>";
                                    echo "</tr>";
                                }   
                            } 
                            if($b!="" && $l=="" && $d=="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {
                                    echo "<tr>";
                                    echo "<th>Breakfast</th>";
                                    echo "<td>$row[1]</td>";
                                    echo "<td>$row[2]</td>";
                                    echo "<td>$row[3]</td>";
                                    echo "<td>$row[4]</td>";
                                    echo "<td>$row[5]</td>";
                                    echo "<td>$row[6]</td>";
                                    echo "<td>$row[7]</td>";
                                    echo "</tr>";
                                }   
                            } 
                            if($b=="" && $l!="" && $d=="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {                                    
                                    echo "<tr>";
                                    echo "<th>Lunch</th>";
                                    echo "<td>$row[8]</td>";
                                    echo "<td>$row[9]</td>";
                                    echo "<td>$row[10]</td>";
                                    echo "<td>$row[11]</td>";
                                    echo "<td>$row[12]</td>";
                                    echo "<td>$row[13]</td>";
                                    echo "<td>$row[14]</td>";
                                    echo "</tr>";
                                }   
                            } 
                            if($b=="" && $l=="" && $d!="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {                                    
                                    echo "<tr>";
                                    echo "<th>Dinner</th>";
                                    echo "<td>$row[15]</td>";
                                    echo "<td>$row[16]</td>";
                                    echo "<td>$row[17]</td>";
                                    echo "<td>$row[18]</td>";
                                    echo "<td>$row[19]</td>";
                                    echo "<td>$row[20]</td>";
                                    echo "<td>$row[21]</td>";
                                    echo "</tr>";
                                }   
                            } 
                             
                            if($b!="" && $l!="" && $d=="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {     
                                    echo "<tr>";
                                    echo "<th>Breakfast</th>";
                                    echo "<td>$row[1]</td>";
                                    echo "<td>$row[2]</td>";
                                    echo "<td>$row[3]</td>";
                                    echo "<td>$row[4]</td>";
                                    echo "<td>$row[5]</td>";
                                    echo "<td>$row[6]</td>";
                                    echo "<td>$row[7]</td>";
                                    echo "</tr>";           
                                    echo "<tr>";
                                    echo "<th>Lunch</th>";
                                    echo "<td>$row[8]</td>";
                                    echo "<td>$row[9]</td>";
                                    echo "<td>$row[10]</td>";
                                    echo "<td>$row[11]</td>";
                                    echo "<td>$row[12]</td>";
                                    echo "<td>$row[13]</td>";
                                    echo "<td>$row[14]</td>";
                                    echo "</tr>";    
                                }   
                            } 
                            if($b!="" && $l=="" && $d!="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {     
                                    echo "<tr>";
                                    echo "<th>Breakfast</th>";
                                    echo "<td>$row[1]</td>";
                                    echo "<td>$row[2]</td>";
                                    echo "<td>$row[3]</td>";
                                    echo "<td>$row[4]</td>";
                                    echo "<td>$row[5]</td>";
                                    echo "<td>$row[6]</td>";
                                    echo "<td>$row[7]</td>";
                                    echo "</tr>";           
                                    echo "<tr>";
                                    echo "<th>Dinner</th>";
                                    echo "<td>$row[15]</td>";
                                    echo "<td>$row[16]</td>";
                                    echo "<td>$row[17]</td>";
                                    echo "<td>$row[18]</td>";
                                    echo "<td>$row[19]</td>";
                                    echo "<td>$row[20]</td>";
                                    echo "<td>$row[21]</td>";
                                    echo "</tr>";    
                                }   
                            } 
                            if($b=="" && $l!="" && $d!="")
                            {
                                $sql="select * from timetable order by id desc limit 1 ";
                                $query=mysqli_query($conn,$sql);
                                while($row=mysqli_fetch_row($query))
                                {     
                                    echo "<tr>";
                                    echo "<th>Lunch</th>";
                                    echo "<td>$row[8]</td>";
                                    echo "<td>$row[9]</td>";
                                    echo "<td>$row[10]</td>";
                                    echo "<td>$row[11]</td>";
                                    echo "<td>$row[12]</td>";
                                    echo "<td>$row[13]</td>";
                                    echo "<td>$row[14]</td>";
                                    echo "</tr>";           
                                    echo "<tr>";
                                    echo "<th>Dinner</th>";
                                    echo "<td>$row[15]</td>";
                                    echo "<td>$row[16]</td>";
                                    echo "<td>$row[17]</td>";
                                    echo "<td>$row[18]</td>";
                                    echo "<td>$row[19]</td>";
                                    echo "<td>$row[20]</td>";
                                    echo "<td>$row[21]</td>";
                                    echo "</tr>";    
                                }   
                            } 
                        ?>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         16:9 aspect ratio 
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="img/T1.jpg" id="video" allowfullscreen allowscriptaccess=""
                                allow=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation End -->


        
        

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
