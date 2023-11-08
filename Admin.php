<?php
include('partials/admin header.php');
?>


<?php

if (isset($_POST['submit'])) {
  $query = "SELECT * FROM admin WHERE `username`='$_POST[username]' AND `password`='$_POST[password]'";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result)==1)
  {
    $_SESSION['AdminId'] = $_POST['username'];
    header("Location: Admin Panel.php");
  }
  else{
    ?>
      <script>
        alert("Password is incorrect");
      </script>
    <?php
  }
}

?>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">
  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">E-Admin</h4>
      <p class="text-center">Login</p>

      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
          </div>
          <input name="username" class="form-control" placeholder="User Id" type="text" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
          </div>
          <input class="form-control" placeholder="Enter Password" type="password" name="password" value="" required>
        </div>

        <div class="form-group">
          <button type="submit" name="submit" class="btn 
                btn-block btn-outline-info">Login Now</button>
        </div>
      </form>
    </article>
  </div>
</div>

<?php
include('partials/admin footer.php');
?>