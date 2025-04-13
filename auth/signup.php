<?php
ob_start(); // Output buffering start
require "../includes/header.php";
require "../config/config.php";

if (isset($_SESSION['username'])) {
    header("location: " . APPURL . "");
    exit(); // Always exit after header redirect
}

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password'])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO users (email, username, password) 
                                  VALUES (:email, :username, :password)");
        $insert->execute([
            ":email" => $email,
            ":username" => $username,
            ":password" => $password,
        ]);

        header("Location: login.php");
        exit(); // Always exit after header
    }
}
?>

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="<?php echo APPURL; ?>/img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Sign Up</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Signup Section Begin -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login__form">
                    <h3>Sign Up</h3>
                    <form action="signup.php" method="POST">
                        <div class="input__item ">
                            <input name="email" class="col-md-12" type="text" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="username" type="text" placeholder="Your Name">
                            <span class="icon_profile"></span>
                        </div>
                        <div class="input__item">
                            <input name="password" type="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" name="submit" class="site-btn">Register</button>
                    </form>
                    <h5>Already have an account? <a href="login.php">Log In!</a></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Signup Section End -->

<?php require "../includes/footer.php"; ?>
<?php ob_end_flush(); // Flush output buffer ?>
