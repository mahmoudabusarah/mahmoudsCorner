<?php 
$ID = $_GET['id'];
$productnamez = $_GET['productname'];
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
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
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
                                    <a href="index"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="index.php">Home</a> </li>
                                        <li> <a href="about.php">About</a> </li>
                                        <li><a href="my_orders.php?id=<?php echo$ID ?>">Review my order</a></li>
                                        <li><a href="my_orders.php?id=<?php echo$ID ?>">Reporting a problem</a></li>
                                        <li><a href="index.php">log out</a></li>
                                        <li class="last">
                                            <a href="#"><img src="public/images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/call.png" />(+71)9876543109</li>
                                <li><img src="icon/email.png" />demo@gmail.com</li>
                                <li><img src="icon/loc.png" />Location</li>
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
                        <h2>Checkout</h2>
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
                            //Get Heroku ClearDB connection information
                            $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                            $servername = $cleardb_url["host"];
                            $username = $cleardb_url["user"];
                            $password = $cleardb_url["pass"];
                            $dbname = ltrim($cleardb_url["path"], '/');
                            $active_group = 'default';
                            $query_builder = TRUE;
                        
                            // UNCOMMENT FOR LOCALHOST CONNECTION
                            // $servername = "localhost";
                            // $username = "root";
                            // $password = "";
                            // $dbname = "techstore";

                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            // Check connection
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $sql = "SELECT * FROM `product` WHERE `P_Name` = '$productnamez'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $pt = $row['P_Type'];
                                    $pn = $row['P_Name'];
                                    $py = $row['P_year'];
                                    $color = $row['P_color'];
                                    $pimage = $row['P_mage'];
                                    $pprice = $row['P_Price']

                                  ?>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                                     <div class="brand_box">
                                          <img src="image/<?php echo$row['P_mage'];?>" alt="img" />
                                          <h3>$<strong class="red"><?php echo $row['P_Price'] ;?></strong></h3>
                                          <p><?php echo $row['P_Type'].' '.$row['P_Name'] .$row['P_year'].'  color '.$row['P_color']?></p>
                                   </div>
                                 </div>
                                <?php
                                }
                            } else {
                                echo "0 results";
                            }

                            
?>
                    
                    </div>
                    <div class="col-md-12">
                        <?php 
                        
                        $sql2 = "SELECT * FROM `user` WHERE `User_Email` = '$ID'";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result2) > 0) {
                            // output data of each row
                            while($row2 = mysqli_fetch_assoc($result2)) {
                             
                                $userfullname = $row2['User_Full_Name'];
                                $useremai = $row2['User_Email'];
                                $useradress = $row2['User_Adress'];
                                $userstate = $row2['User_State'];
                                $usercity = $row2['User_city'];
                                $user_zipcode = $row2['user_zipcode'];
                                $User_phone_number = $row2['User_phone_number'];

                                ?>
                                  <p>Customer name : <?php echo $row2['User_Full_Name']?></p>
                                  <p>Customer Email : <?php echo $row2['User_Email']?></p>
                                  <p>Customer Adress : <?php echo $row2['User_Adress'].' '.$row2['User_State'].' '.$row2['User_city'].' '.$row2['user_zipcode']?></p>
                                <?php
                                
                            }}

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout -->
    <section class="my-2 py-3 checkout">
        <div class="container text-center mt-1 pt-5">
            <h2>Checkout Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="post" action="">
                <div class="form-group checkout-large-element">
                    <label for="">Credit Card Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="your name">
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Credit card number </label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Credit card number ">
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">CVV</label>
                    <input type="text" class="form-control" id="checkout-phone" name="phone" placeholder="Card CVV">
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">expairy date</label>
                    <input type="tel" class="form-control" id="checkout-city" name="city" placeholder="expiry date">
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Card Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="card address">
                </div>
        
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: <?php echo $pprice;?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="checkout_button">
                </div>
            </form>
                    <?php

                    if(isset($_POST['checkout_button'])){
                        $sq3l = "INSERT INTO `order_table`( `Product_name`, `user_name`, `User_Email`, `User_Adress`, `User_City`, `user_State`, `user_zipcode`, `user_phone_number`, `order_total`, `product_color`, `product_type`, `product_Image`)
                         VALUES ('$pn','$userfullname','$useremai','$useradress','$usercity','$userstate','$user_zipcode','$User_phone_number','$pprice','$color','$pt','$pimage')";

                    if ($conn->query($sq3l) === TRUE) {
                        echo"<h3>your order have made successfully</h3>";
                    } else {
                    echo "Error: " . $sql3 . "<br>" . $conn->error;
                        }
                    }

                    ?>
        </div>
</section>
<!-- end cart section -->


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
                                    <li> <a href="index.php">Home</a> </li>
                                    <li> <a href="about.php">About</a> </li>
                                    <li><a href="brand.php">Brand</a></li>
                                    <li class="active"><a href="cart.php">Cart</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
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