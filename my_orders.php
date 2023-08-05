<?php
$User_ID = $_GET['id'];
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

<body class="main-layout">
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
                                    <a href="index.html"><img src="public/images/logo.png" alt="#"></a>
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
                                        <li><a href="brand.php?id=<?php echo$User_ID ?>">Brand</a></li>
                                        <li><a href="my_orders.php?id=<?php echo$User_ID ?>">Reporting a problem</a></li>
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
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>your orders</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brand -->
    <div class="brand">
        <div class="container">

        </div>
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "techstore";

                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT * FROM `order_table` WHERE `User_Email` = '$User_ID'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $productname =$row['Product_name'];
                                  ?>
                                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                                     <div class="brand_box">
                                          <img src="image/<?php echo$row['product_Image'];?>" alt="img" />
                                          <p><strong class="red"><?php echo $row['user_name'] .' '.$row['User_Email'].' '.$row['user_phone_number'];?></strong></p>
                                          <p><?php echo $row['User_Adress'].' '.$row['User_City'] .$row['user_State'].' '.$row['user_zipcode']?></p>
                                          <p><?php echo $row['product_type'].' '.$row['Product_name'] .'  color '.$row['product_color']."( total :". $row['order_total']." )" ?></p>
                                   </div>
                                   <form method="post" action="userticketformpage.php?id=<?php echo"$User_ID&productname=$productname";?>">
                                   <input class="send" name="lgn" value="report a problem" type="submit">
                                   </form>
                                 </div>
                                <?php
                                }
                            } else {
                                echo "0 results";
                            }

                           
?>
                    
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>your pending Tickets</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->
 <div class="brand">
        <div class="container">

        </div>
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                <?php
                           

                            $sql2 = "SELECT * FROM `tickiting_report` WHERE `User_email` =  '$User_ID' and `ticket_status` ='pending'";
                            $result2 = mysqli_query($conn, $sql2);

                            if (mysqli_num_rows($result2) > 0) {
                                // output data of each row
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    
                                  ?>
                                     <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                                     <div class="brand_box">
                                          <img src="image/<?php echo$row2['damage_image'];?>" alt="img" />
                                          <p><strong class="red"><?php echo $row2['User_name'] .' '.$row2['User_email'];?></strong></p>
                                          <p><?php echo $row2['shipping_adress']?></p>
                                          <p><?php echo $row2['Order_name'].' '.$row2['Order_Device_name'] ."( total :". $row2['Order_total']." )" ?></p>
                                   </div>
                                  
                                 </div>
                                <?php
                                }
                            } else {
                                echo "No tickets";
                            }

                            mysqli_close($conn);
?>
                    
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
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