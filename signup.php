<!DOCTYPE html>

<html lang="en">
<?php
    require_once './header.php';
    require_once INCLUDES['signup-function'];
    register($conn, $_POST);
?>

<title>Sign Up</title>
</head>

<body>
    <?php require_once INCLUDES['nav-main-template']; ?>
    <?php require_once INCLUDES['nav-non-logged-template']; ?>
    <div class="container">
        <div class="content">
           
            <h3 class="title-login-bar">Create a new account</h3>
            <form method="post">
                <!-- Name -->
                <div class="content-block">
                    <div class="first-of-two">
                        <label class="block-label" for="firstName">First Name<label>
                                <input type="text" name="firstName" placeholder="First Name" class="input-login">
                    </div>
                    <div class="second-of-two">
                        <label class="block-label" for="lastName">Last Name<label>
                                <input type="text" name="lastName" placeholder="Last Name" class="input-login">
                    </div>
                </div>
                <!-- University & Dept. -->
                <div class="content-block">
                    <div class="two-of-three">
                        <label class="block-label" for="university">University<label>
                            <div class="option-block">
                                <select class="option-class input-login" id="university" name="university">
                                    <option>United International University</option>
                                    <option>Test 2</option>
                                    <option>Test 3</option>
                                </select>
                            </div>
                    </div>
                    <div class="one-of-three">
                        <label class="block-label" for="department">Department<label>
                            <div class="option-block">
                                <select class="option-class input-login" id="department" name="department">
                                    <option>CSE</option>
                                    <option>EEE</option>
                                    <option>BBA</option>
                                </select>
                                <!-- <div class="down-arrow">
                                    <svg class="arrow-size" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div> -->
                            </div>
                    </div>
                </div>
                <!-- Email -->
                <div class="margin-top-1-rem">
                    <label class="block-label" for="email">Email<label>
                            <input type="text" name="email" placeholder="Email" class="input-login">
                </div>
                <!-- Passwords -->
                <div class="margin-top-1-rem">
                    <label class="block-label">Password<label>
                            <input type="password" name="password" placeholder="Password" class="input-login">
                            <p class="sm-text">Make it as long and as crazy as you'd like</p>
                </div>
                <div class="login-container"><button type="submit" name="signup" class="btn-register">Sign Up</button>
                    <a href="<?php echo PAGES['login']; ?>" class="forgot-password">Already have an account?</a>
                </div>
        </div>
        </form>
    </div>
    </div>
</body>

</html>