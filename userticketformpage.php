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
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li class="active"> <a href="index.php">Home</a> </li>
                                        <li> <a href="about.php">About</a> </li>
                                        <li><a href="brand.php?id=<?php echo$ID ?>">Brand</a></li>
                                        <li><a href="my_orders.php?id=<?php echo$ID ?>">Reporting a problem</a></li>
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

                            $sql = "SELECT * FROM `order_table` WHERE `Product_name`= '$productnamez'";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $Order_ID = $row['Order_ID'];
                                    $pt = $row['product_type'];
                                    $pn = $row['Product_name'];
                                   // $py = $row['P_year'];
                                    $color = $row['product_color'];
                                    $pimage = $row['product_Image'];
                                    $pprice = $row['order_total']

                                  ?>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                                     <div class="brand_box">
                                          <img src="image/<?php echo$row['product_Image'];?>" alt="img" />
                                          <h3>$<strong class="red"><?php echo $Order_ID ." ".$row['order_total'] ;?></strong></h3>
                                          <p><?php echo $row['product_type'].' '.$row['Product_name'] .'  color '.$row['product_color']?></p>
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
            <h2>Ticketing Form</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="post" action="" enctype="multipart/form-data">
                <div class="form-group checkout-large-element">
                    <label for="">Subject:</label>
                    <input type="text" class="form-control" id="checkout-name" name="subject" placeholder="subject">
                </div>
                <div class="form-group checkout-large-element">
               
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-group checkout-large-element">
                    <select class="form-control" name="urgent">
                              <option value="">urgent of this problem</option>
                              <option value="Low">Low</option>
                              <option value="medium">medium</option>
                              <option value="high">high</option>
                    </select>
                </div>
                <div class="form-group checkout-large-element"> 
                    <textarea class="form-control" id="checkout-city" name="User_problem" placeholder="please tell whats wrong in details"></textarea>
                </div>
                
                <div class="form-group checkout-btn-container">
                    <p>Total Amount: <?php echo $pprice;?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="checkout_button" value="report">
                </div>
            </form>
            <?php

            if(isset($_POST['checkout_button'])){

                $User_problem = $_POST["User_problem"];
                $urgent = $_POST['urgent'];
                $subject = $_POST['subject'];

                $target_dir = "tickting_image/";
                $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
                $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }

                    
                    // Check if file already exists
                    if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                        }
                        
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }
                        
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                            } else {
                            echo "Sorry, there was an error uploading your file.";
                            }
                        }

                        $tickting_image = basename($_FILES['fileToUpload']['name']);

                $sql3 = "INSERT INTO `tickiting_report`(`Order_ID`, `Order_name`, `Order_Device_name`, `Order_total`, 
                `User_name`, `User_email`, `shipping_adress`
                , `User_problem`, `urgent_status`, `damage_image`, `ticket_subject`, `ticket_status`) VALUES ('$Order_ID','$pn','$pt',
                '$pprice','$userfullname',
                '$useremai','$useradress $usercity $userstate $user_zipcode','$User_problem','$urgent','$tickting_image','$subject','pending')";
                if ($conn->query($sql3) === TRUE) {
                echo "problem has been reported";
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
                                    <li><a href="brand.html">Brand</a></li>
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