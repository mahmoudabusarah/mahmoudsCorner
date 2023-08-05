<?php
if(isset($_POST["lgn"])){

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

    $Email= $_POST['Email'];
    $pass = $_POST['pass'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM `user` WHERE `User_Email` = '$Email' and `User_password` = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        header("location:brand.php?id=$Email");
    }
    } else {
    echo "wrong email and password";
    }

}
?>

