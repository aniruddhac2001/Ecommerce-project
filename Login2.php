<?php
include('partials/login header.php');

?>


<?php

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "SELECT * FROM admin WHERE email='$email' ";
  $query = mysqli_query($conn, $email_search);

  $email_count = mysqli_num_rows($query);

  if ($email_count) {
    $email_pass = mysqli_fetch_assoc($query);

    $cpass = $email_pass['cpassword'];

    $_SESSION['username'] = $email_pass['username'];



    if ($password == $cpass) {
?>
      <script>
        alert("Login successful");
      </script>
    <?php
      header('Location:home.php');
    } else {
    ?>
      <script>
        alert("Password is incorrect");
      </script>
    <?php
    }
  } else {
    ?>
    <script>
      alert("Email Id Not Found");
    </script>
<?php
  }
}

?>


<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Login</h4>
      <p class="text-center">Welcome Back</p>

      <p>
      <div class="g-signin2" data-onsuccess="onSignIn" data-width="300" data-height="50" data-prompt="select_account"></div>
      <script>
        function onSignIn(user) {
          var userdata = user.getBasicProfile();
          $.ajax({
            url: 'storedata.php',
            type: 'POST',
            data: {
              'username': userdata.getName(),
              'userid': userdata.getId(),
              'emailid': userdata.getEmail(),
              'imageurl': userdata.getImageUrl()
            },
          })
        }
      </script>
      </p>
      <p class="divider-text">
        <span class="bg-light">or</span>
      </p>

      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POSt">
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
          </div>
          <input name="email" class="form-control" placeholder="Email Id" type="email" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
          </div>
          <input class="form-control" placeholder="Enter Password" type="password" name="password" value="" required>
        </div>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6Le2ymUlAAAAABf_xTAAAQID4gJRebe8T_kMSDOP"></div>
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn 
                btn-block btn-outline-success">Login Now</button>
        </div>
        <p class="text-center">Not have an Account? <a href="Register.php">Sign up</a></p>
        <p class="text-center">Are you Admin? <a href="Admin.php">Log in</a></p>
      </form>
    </article>
  </div>
</div>

<script>
  $(document).on('click', '.btn', function() {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
      alert("Please verify that you are not robot");
      return false;
    }
  })
</script>

<?php
include('partials/login footer.php');
?>