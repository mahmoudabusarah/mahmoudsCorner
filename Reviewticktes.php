<?php
$support_ID = $_GET['id'];
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b976babf6ca992:90e4708d@us-cdbr-east-06.cleardb.net/heroku_56df8df0a12e22b?reconnect=true"));
$servername = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$dbname = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// UNCOMMENT FOR LOCALHOST CONNECTION
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "techstore";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql4 = "SELECT * FROM `support_table` WHERE `Support_Email` = '$support_ID' ";
$result2 = $conn->query($sql4);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row2 = $result2->fetch_assoc()) {
   $supportname  = $row2['Support_Name'];
   $supportemail = $row2['Support_Email'];
  }
} else {
  echo "0 results";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>pomato</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="public/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="public/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="public/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="public/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="public/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index"><img src="public/images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="index.php">Home</a> </li>
                                        <li> <a href="about.php">About</a> </li>
                                        <li><a href="AddingProduct.php?id=<?php echo$support_ID ?>">Adding product</a></li>
                                        <li><a href="Reviewticktes.php?id=<?php echo$support_ID ?>">Review ticktes</a></li>
                                        <li><a href="index.php">log out</a></li>
                                        <li class="last">
                                            <a href="#"><img src="public/images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="public/icon/call.png" />(+71)9876543109</li>
                                <li><img src="public/icon/email.png" />demo@gmail.com</li>
                                <li><img src="public/icon/loc.png" />Location</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="public/images/banner.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <span>All New Phones </span>
                            <h1>up to 25% Flat Sale</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content
                                <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                            <a class="buynow" href="#">Buy Now</a>
                            <ul class="social_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="public/images/banner.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <span>All New Phones </span>
                            <h1>up to 25% Flat Sale</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content
                                <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                            <a class="buynow" href="#">Buy Now</a>
                            <ul class="social_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="public/images/banner.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <span>All New Phones </span>
                            <h1>up to 25% Flat Sale</h1>
                            <p>It is a long established fact that a reader will be distracted by the readable content
                                <br> of a page when looking at its layout. The point of using Lorem Ipsum is that</p>
                            <a class="buynow" href="#">Buy Now</a>
                            <ul class="social_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>
    <!-- contact -->
    <div class="about">
        <div class="container">
            <div class="row">
            <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "techstore";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM `tickiting_report` WHERE `ticket_status` = 'pending'";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                $Order_ID = $row['Order_ID']
                ?>
                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="tickting_image/<?php echo $row['damage_image']?>" alt="img" /></figure>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2" style="text-align: left;">
                    <div class="about_box">
                        <h3>user tickets</h3>
                        <p> ticket subject : <?php echo$row['ticket_subject'];?> (<?php echo $row['urgent_status'];?> )</p>
                        <p>Customer name : <?php echo$row['User_name'];?> , customer Email : <?php echo$row['User_email']; ?>, customer adress : <?php echo$row['shipping_adress']?></p>
                        <p>order Details : <?php echo $row['Order_ID'] .', '.$row['Order_name'] .' , '.$row['Order_Device_name'] .' , '.$row['Order_total'];?></p>
                        <p>ticket in detail :<?php echo$row['User_problem'];?> </p>
                        <?php
                        
                        
                        ?>
                        <form method="post">
                          <div class=" col-md-12">
                                <input class="send" name="adp" value="Marked as solved" type="submit">
                            </div>
                            </form>
                    </div>
             
              <?php 
                            if(isset($_POST['adp'])){


                                $sql2 = "UPDATE `tickiting_report` SET `ticket_status`='solved',`support_Name`='$supportname',`Support_Email`='$supportemail' WHERE `Order_ID` = '$Order_ID'";

                                if ($conn->query($sql2) === TRUE) {
                                    echo"status was updated successfully";
                                    } else {
                                    echo "there is no un solved tickets " . $conn->error;
                                    }


                            }
                        ?>
            </div>
              <?php
              
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            
            
            ?>
           

        </div>
    </div>
    </div>
    <!-- end contact -->

    <!-- footer -->
    <footer>
        <div id="contact" class="footer">
            <div class="container">
                <div class="row pdn-top-30">
                    <div class="col-md-12 ">
                        <div class="footer-box">
                            <div class="headinga">
                                <h3>Address</h3>
                                <span>Healing Center, 176 W Streetname,New York, NY 10014, US</span>
                                <p>(+71) 8522369417
                                    <br>demo@gmail.com</p>
                            </div>
                            <ul class="location_icon">
                                <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li> <a href="#"><i class="fa fa-instagram"></i></a></li>

                            </ul>
                            <div class="menu-bottom">
                                <ul class="link">
                                    <li> <a href="#">Home</a></li>
                                    <li> <a href="#">About</a></li>
                                    
                                    <li> <a href="#">Brand </a></li>
                                    <li> <a href="#">Specials  </a></li>
                                    <li> <a href="#"> Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>© 2019 All Rights Reserved. Design By<a href="https://templates.beatsnoop.com/"> Free Html Templates</a></p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/popper.min.js"></script>
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/jquery-3.0.0.min.js"></script>
    <script src="public/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="public/js/custom.js"></script>
    <!-- javascript -->
    <script src="public/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>