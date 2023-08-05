<?php
if(isset($_POST["lgn"])){


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