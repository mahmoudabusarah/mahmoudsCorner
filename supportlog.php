<?php
if(isset($_POST["lgn"])){


    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "techstore";

    $Email= $_POST['Email'];
    $pass = $_POST['pass'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM `support_table` WHERE `Support_Email`= '$Email' and `Support_Password`='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        header("location:AddingProduct.php?id=$Email");
    }
    } else {
    echo "wrong email and password";
    }

}