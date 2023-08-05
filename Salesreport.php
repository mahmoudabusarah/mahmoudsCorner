
<?php 
    
    $output = "";
             
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

            $sql = "SELECT * FROM `order_table` WHERE 1";
            $result = $conn->query($sql);
                    $i = 1;
                    if(mysqli_num_rows($result) > 0){
                        $output.='
                                <table class="table" bordered="1">
                               
                                <tr>
                                <th>Order ID</th>
                                <th>Product name</th>
                                <th>user Full name</th>
                                <th>User Email</th>
                                <th>User Full Adress</th>
                                <th>user phone number</th>
                                <th>order total</th>
                                <th>product color</th>
                                <th>product type</th>
                                </tr>

                        ';
    
                        while($row = mysqli_fetch_array($result)){
                            $output .= '
                            <tr>
                            <td>' . $row["Order_ID"] . '</td>
                            <td>' . $row["Product_name"] . '</td>
                            <td>' . $row["user_name"] . '</td>
                            <td>' . $row["User_Email"] . '</td>
                            <td>' . $row['User_Adress'].' , '.$row['user_State'].' , '.$row['User_City'].' , '.$row['user_zipcode'] . '</td>
                            <td>' . $row["user_phone_number"] . '</td>
                            <td>' . $row["order_total"] . '</td>
                            <td>' . $row["product_color"] . '</td>
                            <td>' . $row["product_type"] . '</td>
                        </tr>
                                    ';
                                    
                                }
                        $output.='</table>';
                        
                        header('Content-Type: application/xls');
                        header('Content-Disposition:attachment;filename=Salesreport.xls');
                        echo $output;
                    }
                    else{
                        echo 'no data found';
                    }

            
           ?>
   


