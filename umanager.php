<?php
include('partials/user info header.php');
include('config.php');
if (isset($_POST['submit'])) {

   $data_name = $_POST['data_name'];
   $data_email = $_POST['data_email'];
   $data_phone = $_POST['data_phone'];
   $data_password = $_POST['data_password'];
   $data_cpassword = $_POST['data_cpassword'];
}

if (isset($_POST['update_data'])) {
   $update_id = $_POST['update_id'];
   $update_data_name = $_POST['update_data_name'];
   $update_data_email = $_POST['update_data_email'];
   $update_data_phone = $_POST['update_data_phone'];
   $update_data_password = $_POST['update_data_password'];
   $update_data_cpassword = $_POST['update_data_cpassword'];

   $update_query = mysqli_query($conn, "UPDATE `admin` SET username = '$update_data_name', email = '$update_data_email', phone = '$update_data_phone', password = '$update_data_password', cpassword = '$update_data_cpassword' WHERE id = '$update_id'");

   if ($update_query) {
      move_uploaded_file($update_data_password, $update_data_cpassword);
      $message[] = 'Data updated succesfully';
      header('location:umanager.php');
   } else {
      $message[] = 'Data could not be updated';
      header('location:umanager.php');
   }
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `admin` WHERE id = $delete_id ") or die('query failed');
   if ($delete_query) {
      header('location:umanager.php');
      $message[] = 'Data has been deleted';
   } else {
      header('location:umanager.php');
      $message[] = 'Data could not be deleted';
   };
};
?>
<section id="header">
   <a href="#" class="logo">E-<span>Admin</span></a>
   <div>
      <ul id="navbar">
         <li><a href="Admin Panel.php">Product Info</a></li>
         <li><a href="logout.php">Welcome Admin</a></li>
      </ul>
   </div>
</section>

<section class="user-info">

   <table>

      <thead>
         <th>Name</th>
         <th>E-mail</th>
         <th>Phone</th>
         <th>Password</th>
         <th>Confirm Password</th>
         <th>Action</th>
      </thead>
      <?php

      $select_data = mysqli_query($conn, "SELECT * FROM `admin`");
      if (mysqli_num_rows($select_data) > 0) {
         while ($row = mysqli_fetch_assoc($select_data)) {
      ?>

            <tr>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['phone']; ?></td>
               <td><?php echo $row['password']; ?></td>
               <td><?php echo $row['cpassword']; ?></td>
               <td>
                  <a href="umanager.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> Delete </a>
                  <a href="umanager.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
               </td>
            </tr>

      <?php
         };
      } else {
         echo "<div class='empty'>No Data Added</div>";
      };
      ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php

   if (isset($_GET['edit'])) {
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = $edit_id");
      if (mysqli_num_rows($edit_query) > 0) {
         while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
   ?>

            <form action="" method="post" enctype="multipart/form-data">
               <input type="hidden" name="update_id" value="<?php echo $fetch_edit['id']; ?>">
               <input type="text" class="box" required name="update_data_name" value="<?php echo $fetch_edit['username']; ?>">
               <input type="mail" class="box" required name="update_data_email" value="<?php echo $fetch_edit['email']; ?>">
               <input type="number" class="box" required name="update_data_phone" value="<?php echo $fetch_edit['phone']; ?>">
               <input type="text" class="box" required name="update_data_password" value="<?php echo $fetch_edit['password']; ?>">
               <input type="text" class="box" required name="update_data_cpassword" value="<?php echo $fetch_edit['cpassword']; ?>">
               <input type="submit" value="update the data" name="update_data" class="btn">
               <a href="umanager.php" class="option-btn"> Cancel </a>
            </form>

   <?php
         };
      };
      echo "<script>
         document.querySelector('.edit-form-container').style.display = 'flex';
         </script>";
   };
   ?>

</section>

<script src="script.js"></script>

<?php
include('partials/user info footer.php');
?>