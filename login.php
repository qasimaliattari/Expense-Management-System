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
        $msg = "please enter valid username and password";
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
            <!-- <div class="forgot-pass">
               <a href="#">Forgot Password?</a>
            </div> -->
            <button name="signin">Sign in</button>
            <h5 style="color:red;"><?php echo $msg;?></h5>
            <div class="sign-up">
               Not a member?
               <a href="signup.php">signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>





