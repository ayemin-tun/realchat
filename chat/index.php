<?php require_once "header.php";?>
<body>
    <div class="wrapper">
        <selection class="form signup">
            <header>RealTime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="emial">Email Address</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter New Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="img">Select Image</label>
                        <input type="file" name="img" id="img" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue to Chat">
                    </div>
                
            </form>
            <div class="link">
                Already Signed up?<a href="login.php">Login Now</a>
            </div>
        </selection>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>