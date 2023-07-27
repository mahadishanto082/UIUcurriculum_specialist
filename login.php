<!DOCTYPE html>

<html lang="en">
<?php
    require_once './header.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password) )
        {
            //here we read from database and verify the username and password
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $_SESSION['email'] = $email;
                    header("Location: ". PAGES['home']);
                    die;
                }
            }
            
            echo "wrong username or password!";
        }
        else
        {
            echo "Email or password cannot be empty!";
        }
    }
?>

<title>Sign In</title>
</head>

<body>
    <?php require_once INCLUDES['nav-main-template']; ?>
    <?php require_once INCLUDES['nav-non-logged-template']; ?>
    <div class="container">
    
        <div class="content">
            
            <h1 class="title-login-bar display-5">LOGIN</h1>
            <form action="<?php echo PAGES['login']; ?>" method="post">
                <div class="margin-top-1-rem">
                    <label class="block-label" for="email">Email<label>
                            <input type="text" placeholder="Email" class="input-login" name="email">
                            <!-- <span class="empty-email">Email field is required </span> -->
                </div>
                <div class="margin-top-1-rem">
                    <label class="block-label">Password<label>
                            <input type="password" placeholder="Password" class="input-login" name="password">
                </div>
                <div class="login-container">
                    <button type="submit" class="btn-login">Login</button>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                <a href="<?php echo PAGES['signup']; ?>">
                    <div class="btn-new-acc">Create new account</div>
                </a>
        
        </form>
        </div>
    </div>
    <!-- </div> -->
</body>

</html>