
    <?php 
    
    $output = "";
                if(isset($_POST['lgn2'])){
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

            $sql = "SELECT * FROM `tickiting_report` WHERE `ticket_status` = 'solved'";
            $result = $conn->query($sql);
                    $i = 1;
                    if(mysqli_num_rows($result) > 0){
                        $output.='
                                <table class="table" bordered="1">
                                    <tr>
                                    <th>Order ID</th>
                                    <th>ticket subject</th>
                                    <th>urgent status</th>
                                    <th>urgent status</th>
                                    <th>User name</th>
                                    <th>User email</th>
                                    <th>Order name</th>
                                    <th>Order Device name</th>
                                    <th>User problem</th>
                                    </tr>
                        ';
    
                        while($row = mysqli_fetch_array($result)){
                            $output .= '
                                    <tr>
                                        <td>' . $row["Order_ID"] . '</td>
                                        <td>' . $row["ticket_subject"] . '</td>
                                        <td>' . $row["urgent_status"] . '</td>
                                        <td>' . $row["User_name"] . '</td>
                                        <td>' . $row["User_email"] . '</td>
                                        <td>' . $row["Order_name"] . '</td>
                                        <td>' . $row["Order_Device_name"] . '</td>
                                        <td>' . $row["User_problem"] . '</td>
                                    </tr>
                                    ';
                                    
                                }
                        $output.='</table>';
                        
                        header('Content-Type: application/xls');
                        header('Content-Disposition:attachment;filename=solvedticketsreports.xls');
                        echo $output;
                    }
                    else{
                        echo 'no data found';
                    }

                } 
           ?>
   


