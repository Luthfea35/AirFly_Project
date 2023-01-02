<?php
session_start();
include 'admin/db_connect.php';

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $username = $_POST['username'];
   $username = filter_var($username, FILTER_SANITIZE_STRING);
   $mobile = $_POST['mobile'];
   $mobile = filter_var($mobile, FILTER_SANITIZE_STRING);
   $pass = ($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = ($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $adress = $_POST['adress'];
   $adress = filter_var($adress, FILTER_SANITIZE_STRING);

   $sql= (" SELECT * FROM users WHERE username='$username' ");
   $query=$conn->query($sql);
  
   if(mysqli_num_rows($query)>0){
     echo 'username already exist!';
   }else{
      if($pass != $cpass){
        echo  'confirm password not matched!';
      }else{
         $insert=mysqli_query($conn,"INSERT INTO
          users(name, address,contact, username, password) 
          VALUES('$name','$adress','$mobile','$username','$pass')");
         
               echo 'signup successfully!';
               //header('location:signin.php');
               ?>
<script>
window.location.href = 'signin.php';
</script>
<?php
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
    <title>register</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="assets/css/components.css">

</head>

<body>
    <section class="form-container">
        <form action="" enctype="multipart/form-data" method="POST">
            <h3>Sign Up</h3>
            <input type="text" name="name" class="box" placeholder="enter your name" required>
            <input type="username" name="username" class="box" placeholder="enter your username" required>
            <input type="mobile" name="mobile" class="box" placeholder="enter your Mobile Number" required>
            <input type="password" name="pass" class="box" placeholder="enter your password" required>
            <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
            <input type="text" name="adress" class="box" required placeholder="Enter Your Adress">
            <input type="submit" value="Sign Up" class="btn" name="submit">
            <p>already have an account? <a href="signin.php">Sign in</a></p>
        </form>
    </section>
</body>

</html>