<?php
include_once('connection.php');
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
.back {
  background: #F1F8FF;
  width: 80%;
  position: absolute;
  top: 0;
  bottom: 0;
}

.div-center {
  width: 400px;
  height: 400px;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}
</style>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <!-- Navbar & Hero End -->


        <!-- Contact Start -->
            <div class="container">
                
                <div class="row g-4">
<?php
$passerror="";
$emerror="";
if(isset($_POST['submit']))
{
    $passerror="";
    $emerror="";
    $password=$_POST['password'];
    $email=$_POST['email'];
    if($email=="")
    {
        $emerror=" * Required Field ";
    }
    if($password=="")
    {
        $passerror=" * Required Password ";
    }
    if($email!="" && $password!="")
    {
        $count=0;
            $sql="select email,password,name from userlogin where email='$email' and password='$password'";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_row($query))
            {
                $count++;
                $_SESSION['email']=$email;
                $_SESSION['user_name']=$row[2];
                echo "<script>window.location.href='index.php';</script>";
            }
            if($count==0)
            {
                echo "<script>alert('Invalid Email and Password');</script>";
            }
    }
}
?>

                <div class="back">
                    <div class="div-center">
                        <div class="content">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h1 class="mb-5"><a href="Ceac.php">Login</a></h1>
                            </div>
                            <form method="post">
                            <div class="form-group">
                                <span style="color:red;"><?php echo $emerror; ?></span>
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <span style="color:red;"><?php echo $passerror; ?></span>
                                <div class="form-floating">
                                    <input type="password" class="form-control" name="password" placeholder="College">
                                    <label for="subject">Password</label>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                            <hr />
                            <a href="Ceac.php" class="btn btn-link">Signup</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        <!-- <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Menu</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Reservation</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Near ,Ganesh Nagar, R.K.Nagar ,Kolhapur</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 8390132705</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>Mummaskitchen@gmail.com</p>
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
                        <p>08AM - 10PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Sing_In</h4>
                       
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
                            &copy; <a class="border-bottom" href="#"></a>
							
							This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. 
							Designed By <a class="border-bottom" href="https://htmlcodex.com"></a>
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
        </div> -->
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