<?php 
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','chat');

    // define('DB_HOST','sql106.infinityfree.com');
    // define('DB_USER','if0_34494162');
    // define('DB_PASS','x9RxiCE0GKqa');
    // define('DB_NAME','if0_34494162_chat');

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if(!$conn){
        echo "Database Connected" . mysqli_connect_error();
    }
?>