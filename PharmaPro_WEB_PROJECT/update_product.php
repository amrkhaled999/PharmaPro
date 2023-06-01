<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['update_product'])) {
      $update_p_id = $_POST['update_p_id'];
      $update_p_name = $_POST['update_p_name'];
      $update_p_price = $_POST['update_p_price'];
      $update_p_image = $_FILES['update_p_image']['name'];
      $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
      $update_p_image_folder = 'uploaded_img/'.$update_p_image;

      // Check if a new image file is uploaded
      if ($update_p_image) {
         move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);

         $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image_folder' WHERE id = $update_p_id");
      } else {
         $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price' WHERE id = $update_p_id");
      }

      if ($update_query) {
         header("Location: admin.php"); // Redirect to the admin.php page
         exit(); // Terminate the current script
      } else {
         echo 'MySQL Error: ' . mysqli_error($conn);
      }
   }
}
?>
