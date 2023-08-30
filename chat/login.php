<?php require_once "header.php";?>
<body>
    <div class="wrapper">
        <selection class="login form">
            <header>RealTime Chat App</header>
            <form action="#">
                <div class="error-txt">
                    This is an error Message
                </div>
                
                    <div class="field input">
                        <label for="emial">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email">
                    </div>
                    
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Your Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    
                    <div class="field button">
                        <input type="button" value="Continue to Chat">
                    </div>
                
            </form>
            <div class="link">
                Not yet Signed up?<a href="index.php"> Signup Now</a>
            </div>
        </selection>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>