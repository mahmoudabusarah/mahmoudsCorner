
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
    
        
        $sql = "SELECT * FROM `admin_table` WHERE `Admin_Email` = '$Email' and `Admin_Password` = '$pass'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            header("location:AdminHomePage.php?id=$Email");
        }
        } else {
        echo "wrong email and password";
        }
    
    }
?>