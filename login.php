<?php
include('config.php');
include('functions.php');
?>

<!DOCTYPE html>
<head>
  <title>EMS_login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>

<?php
 
 if(isset($_POST['signin'])){
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);
    $res = mysqli_query($con,"select * from users where username = '$username' and password = '$password'");

    if(mysqli_num_rows($res)>0){
      $row = mysqli_fetch_assoc($res);
      $_SESSION['UID'] = $row['id'];
      $_SESSION['UNAME'] = $row['username']; 
      redirect('dashboard.php');
    }else{
      echo "please enter valid values";
    }

 }
?>



  <div class="wrapper">
    <div class="container">
      
      <div class="sign-up-container">
        <form>
          <h1>Create Account</h1>
          <input type="text" placeholder="Name">
          <input type="email" placeholder="Email">
          <input type="password" placeholder="Password">
          <button class="form_btn">Sign Up</button>
        </form>
      </div>
      <div class="sign-in-container">
        <form method="post">
          <h1>Sign In</h1>
          <input type="text" placeholder="Username" name="username" required>
          <input type="password" placeholder="Password" name="password" required>
          <button class="form_btn" name="signin">SignIn</button>
        </form>
      </div>
      <div class="overlay-container">
        <div class="overlay-left">
          <h1>Welcome Back</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button id="signIn" class="overlay_btn">Sign In</button>
        </div>
        <div class="overlay-right">
          <h1>Hello, Friend</h1>
          <p>Enter your personal details and start journey with us</p>
          <button id="signUp" class="overlay_btn">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/login&regis.js"></script>
</body>
</html>








