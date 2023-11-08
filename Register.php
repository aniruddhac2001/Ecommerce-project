<?php
include('partials/register header.php');
?>

<?php
if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

    $emailquery = "SELECT * FROM admin WHERE email = '$email' ";
    $query = mysqli_query($conn, $emailquery);

    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
?>
        <script>
            alert("Email Already Exists");
        </script>
        <?php
    } else {
        if ($password === $cpassword) {

            $insertquery = "INSERT INTO admin set
                              username = '$username', 
                              email = '$email',
                              phone = '$phone', 
                              password = '$password', 
                              cpassword= '$cpassword'";

            $iquery = mysqli_query($conn, $insertquery);

            if ($iquery) {

        ?>
                <script>
                    alert("Account Created Successfully");
                </script>
                <?php
                header('Location:Login2.php');
                ?>
            <?php
            } else {
            ?>
                <script>
                    alert("No Inserted");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Password are not matching");
            </script>
<?php
        }
    }
}

?>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px">
            <h4 class="card-title mt-3 text-center">Creating Account</h4>
            <p class="text-center">Thanks for Choosing us!</p>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    </div>
                    <input name="username" class="form-control" placeholder="Full Name" type="text" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    </div>
                    <input name="phone" class="form-control" placeholder="Phone number" type="number" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="cpassword" value="" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn 
                btn-block btn-outline-primary">Create Account</button>
                </div>
                <p class="text-center">Already an Account! <a href="Login2.php">Login</a></p>
            </form>
        </article>
    </div>
</div>

<?php
include('partials/register footer.php');
?>