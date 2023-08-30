<?php require_once "header.php";?>
<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<body>
    <div class="wrapper">
        <selection class="chat-area">
            <header>
            <?php 
                include_once "php/config.php";
                $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);
                $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id = '{$user_id}'");
                if(mysqli_num_rows($sql) > 0){
                     $row3 = mysqli_fetch_assoc($sql);
                }
            ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/img/<?=$row3['img']?>" alt="">
                <div class="details">
                    <span><?php echo $row3['fname']." ".$row3['lname']; ?></span>
                    <p><?=$row3['status']?></p>
                </div>
            </header>
            <div class="chat-box">
                
            </div>

            <form action="" class="typing-area">
                <input type="text" name="outgoing_id" id="" value="<?=$_SESSION['unique_id']?>" hidden>
                <input type="text" name="incoming_id" id="" value="<?=$user_id?>" hidden>
                <input type="text" class="input-field" name="message" id="" placeholder="Type a Message here ...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </selection>
    </div>

    <script src="javascript/talk.js"></script>
</body>
</html>