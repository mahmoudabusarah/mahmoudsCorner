<?php

if(isset($_POST['sgnup'])){

    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $cemail = $_POST['email'];
    $pass = $_POST['pass'];
    $Cpass  =$_POST['Cpass'];
    $mob = $_POST['mob'];
    $dob = $_POST['dob'];
    $adress = $_POST['adress'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $zipcode = $_POST['zipcode'];

    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("mysql://b976babf6ca992:90e4708d@us-cdbr-east-06.cleardb.net/heroku_56df8df0a12e22b?reconnect=true"));
    $servername = $cleardb_url["host"];
    $username = $cleardb_url["user"];
    $password = $cleardb_url["pass"];
    $dbname = substr($cleardb_url["path"],1);

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
if($email != $cemail){
    echo " the email does not match";
}
else if($pass != $Cpass){
 echo " the password does not match";
} else { 

    $sql = "INSERT INTO `user`(`User_Full_Name`, `User_Email`, `User_password`, `User_DOB`, `User_Adress`, `User_State`, `User_city`, `user_zipcode`, `User_phone_number`) 
    VALUES ('$fn $ln','$email','$pass','$dob','$adress','$state','$city','$zipcode','$mob')";

    if ($conn->query($sql) === TRUE) {
        header("location:brand.php?id=$email");
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
}
?>