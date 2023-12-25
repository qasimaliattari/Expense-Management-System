<?php
include('header.php');
checkUser();
    
    $label = "ADD";
    $category = "";
    if(isset($_GET['id']) && $_GET['id']>0){
        $label = "EDIT"; 
        $id = get_safe_value($_GET['id']);
        $res = mysqli_query($con,"select * from category where id = $id ");
        $row = mysqli_fetch_assoc($res);
        $category = $row['name'];
    }
    $button = "Submit";
    if(isset($_GET['id']) && $_GET['id']>0){
        $button = "Update";     
    }
?>

<!--*******************
            Preloader start
        ********************-->
<div id="preloader">
  <div class="waviy">
    <span style="--i: 1">L</span>
    <span style="--i: 2">o</span>
    <span style="--i: 3">a</span>
    <span style="--i: 4">d</span>
    <span style="--i: 5">i</span>
    <span style="--i: 6">n</span>
    <span style="--i: 7">g</span>
    <span style="--i: 8">.</span>
    <span style="--i: 9">.</span>
    <span style="--i: 10">.</span>
  </div>
</div>
<!--*******************
			Preloader end
		********************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
  <div class="header-content">
    <nav class="navbar navbar-expand">
      <div class="justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar"><?php echo $label?> Category</div>
        </div>
      </div>
      <div class="justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar">
            <a href="category.php"><button>Back</button></a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
       <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<head>
<link rel="stylesheet" href="css/managecategory.css">
</head>
<body>
        <?php
        $msg = "";
        if(isset($_POST['submit'])){
            $categoryname = get_safe_value($_POST['categoryname']);
            $type = "add";
            $sub_sql = "";
            if(isset($_GET['id']) && $_GET['id']>0){
                $type = "edit";
                $sub_sql= "and id != $id";
                
            }
            

            $res = mysqli_query($con,"select * from category where name = '$categoryname' $sub_sql  ");
            if(mysqli_num_rows($res)>0){
               $msg = "Category Already exists";
            }else{
                $sql = "insert into category (name) values('$categoryname')";
                if(isset($_GET['id']) && $_GET['id']>0){
                $sql = "Update category set name = '$categoryname' where id = $id";
            }
                mysqli_query($con,$sql);
                redirect('category.php');
                }
            }
           
        
        ?>
        <div class="container">
        <div class="sign-in-container">
            <form method="post">
            <input type="text" placeholder="category" name="categoryname" required value="<?php echo $category ?>">
            <button class="form_btn" name="submit"><?php echo $button ?></button>
            
            </form> 
            <?php echo $msg; ?>
        </div>
        </div>
  
</body>



<?php
 include ('footer.php');
?>
