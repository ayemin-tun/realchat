<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $search_name = $fname." ".$lname;
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // check if email already exists in the database
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        
            if (mysqli_num_rows($sql) > 0) {
                echo $email . " - This email is already in use";
            } else {
                // check user uplod file or not
                if(isset($_FILES['img'])){
                    $img_name = $_FILES['img']['name'];//get user uploaded img name
                    $img_type = $_FILES['img']['type'];//get user uploaded img type
                    $tmp_name = $_FILES['img']['tmp_name'];//temporary name use to save/move file in our folder

                    // explode image and get last extension like jpg,png
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode); //get extension of user uploaded img file
                    $extensions = ['png','jpeg','jpg']; //valid extensions for img

                    if(in_array($img_ext,$extensions) === true){
                        $time = time(); //this will return current time for renaming user img file with current time  so img file has unique name
                        //move user uploaded img into our particular folder
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"img/".$new_img_name)){
                            // $status = "Active now"; //once user signup his status will be active now
                            $status = "Active now";
                            $random_id = rand(time(),10000000);
                            $sql2 = mysqli_query($conn,"INSERT INTO users(unique_id,fname,lname,search_name,email,password,img,status) VALUES ({$random_id},'{$fname}','{$lname}','{$search_name}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if($sql2){
                                $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            }
                            // $random_id = rand(time(),10000000);//creating random id for user
                            // //insert all user data into table
                            // $sql2 = mysqli_query($conn,"INSERT INTO users(unique_id,fname,lname,emial,password,img,status) VALUES ({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            // if($sql2){
                            //     $sql3 = mysqli_query($conn,"SELECT * FROM users WHERE email = '{$email}'");
                            //     if(mysqli_num_rows($sql3)>0){
                            //         $row = mysqli_fetch_assoc($sql3);
                            //         $_SESSION['unique_id'] = $row['unique_id'];
                            //         echo "Success";
                            //     }
                                
                            // }
                        }  else echo "Something Went wrong!";
                        
                    }else{
                        echo "please select img file like - png, jpeg, jpg";
                    }

                }else echo "Please select an image file";
            }

        }else{
            echo "$email - not a valid email";
        }
    }else{
        echo "All input field required";
    }

?>