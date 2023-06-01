<?php
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password'];

   $select = "SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);

      if (password_verify($password, $row['password'])) {
         if (isset($row['usertype'])) {
            $userType = $row['usertype'];
            echo "User Type: " . $userType;

            if ($userType == 'admin') {
               $_SESSION['admin_name'] = $row['name'];
               header('location: admin_page.php');
               exit(); // Add exit() after header() redirect
            } elseif ($userType == 'user') {
               $_SESSION['user_name'] = $row['name'];
               header('location: user_page.php');
               exit(); // Add exit() after header() redirect
            } else {
               $error[] = 'Invalid user type!';
            }
         } else {
            $error[] = 'User type not found!';
         }
      } else {
         $error[] = 'Incorrect email or password!';
      }
   } else {
      $error[] = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style3.css">
</head>

<body>

   <div class="form-container">
      <form action="" method="post">
         <h3>Login Now</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
         }
         ?>
         <input type="email" name="email" required placeholder="Enter your email">
         <input type="password" name="password" required placeholder="Enter your password">
         <input type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_form.php">Register Now</a></p>
      </form>
   </div>

</body>

</html>
