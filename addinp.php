<?php
                    if(isset($_POST['adp'])){

                        $pn = $_POST['pn'];
                        $pp = $_POST['pp'];
                        $pb = $_POST['pb'];
                        $py = $_POST['py'];
                        $pc = $_POST['pc'];
                        $pr = $_POST['pr'];

                        $target_dir = "image/";
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

                            //Get Heroku ClearDB connection information
                            $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
                            $servername = $cleardb_url["host"];
                            $username = $cleardb_url["user"];
                            $password = $cleardb_url["pass"];
                            $dbname = ltrim($cleardb_url["path"], '/');;
                            $active_group = 'default';
                            $query_builder = TRUE;
                        
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
                        $imgename = basename($_FILES['fileToUpload']['name']);
                        $sql = "INSERT INTO `product`( `P_Name`, `P_Price`, `P_Type`, `P_mage`, `P_year`, `P_color`, `P_Rating`) 
                        VALUES ('$pn','$pp','$pb','$imgename','$py','$pc','$pr')";

                        if ($conn->query($sql) === TRUE) {
                        header("location:AddingProduct.php?id=mahmoud");
                        exit;
                        } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                                                

                    }
                    ?>