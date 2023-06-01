<?php
// Include the database configuration file
require_once 'config.php';

// Initialize the $error array
$errors = [];

if (isset($_POST['submit'])) {
   // Sanitize and escape the input values
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $user_type = $_POST['user_type'];

   // Check if the user already exists
   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $errors[] = 'User already exists!';
   } else {
      // Check if the passwords match
      if ($password != $cpassword) {
         $errors[] = 'Passwords do not match!';
      } else {
         // Hash the password
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

         // Insert the user data into the database
         $insert = "INSERT INTO user_form (name, email, password, usertype) VALUES ('$name', '$email', '$hashedPassword', '$user_type')";
         mysqli_query($conn, $insert);

         if (mysqli_errno($conn)) {
            die("Database error: " . mysqli_error($conn));
         }

         header('location: login_form.php');
         exit();
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="style3.css">
</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h3>Register Now</h3>
      <?php
      if (!empty($errors)) {
         foreach ($errors as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
         }
      }
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>
   </form>
</div>

</body>
</html>
