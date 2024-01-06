
<?php
include('config.php');
include('functions.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="css/signin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>


<?php
   $msg = "";
   if(isset($_POST['signup'])){
      $username2 = get_safe_value($_POST['username']);
      $password2 = get_safe_value($_POST['password']);
      $sql = "select * from users where username = '$username2'";
      $res = mysqli_query($con, $sql);
      if(mysqli_num_rows($res) > 0){
          $msg = "Username already exists ";
      }else{
          $sql1 = "insert into users (username, password) values ('$username2', '$password2')";
          mysqli_query($con, $sql1);
          header('Location: login.php');
          exit();
      }
  }
  
?>
      <div class="content">
         <div class="text">
         Expense Management System
         </div>
         <form method="post" action="#">
            <div class="field">
               <input type="text" name="username" required>
               <span class="fas fa-user"></span>
               <label>Username</label>
            </div>
            <div class="field">
               <input type="password" name="password" required>
               <span class="fas fa-lock"></span>
               <label>Password</label>
            </div>

            <button name="signup">Sign up</button>
            <div class="sign-up">
               Yes a member?
               <a href="login.php">Login now</a>
            </div>
            <h5 style="color:red;"><?php echo $msg;?></h5>

         </form>
      </div>
   </body>
</html>
