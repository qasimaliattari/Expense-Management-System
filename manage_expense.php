<?php
include('header.php');
checkUser();
    
    $label = "ADD";
    $category_id = "";
    $item = "";
    $price = "";
    $details = "";
    $expense_date = date('Y-m-d');

    if(isset($_GET['id']) && $_GET['id']>0){
        $label = "EDIT"; 
        $id = get_safe_value($_GET['id']);
        $res = mysqli_query($con,"select * from expense where id = $id ");
        $row = mysqli_fetch_assoc($res);
        $category_id = $row['category_id'];
        $item = $row['item'];
        $price = $row['price'];
        $details = $row['details'];
        $expense_date = $row['expense_date'];
        if($row['added_by'] != $_SESSION['UID']){
          redirect('expense');
        }
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
          <div class="dashboard_bar"><?php echo $label?> Expense</div>
        </div>
      </div>
      <div class="justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar">
            <a href="expense.php"><button>Back</button></a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>
       <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <?php
        if(isset($_POST['submit'])){
            $category_id = get_safe_value($_POST['category_id']);
            $item = get_safe_value($_POST['item']);
            $price = get_safe_value($_POST['price']);
            $details = get_safe_value($_POST['details']);
            $expense_date = get_safe_value($_POST['expense_date']);
            $added_on = date('y-m-d h:i:s');

            $type = "add";
            $sub_sql = "";
            if(isset($_GET['id']) && $_GET['id']>0){
                $type = "edit";
                $sub_sql= "and id != $id";
                
            }
            
            $added_by = $_SESSION['UID'];
            $sql = "insert into expense (category_id , item, price , details , added_on , expense_date , added_by) 
                    values('$category_id','$item','$price','$details','$added_on','$expense_date','$added_by')";
                if(isset($_GET['id']) && $_GET['id']>0){
                $sql = "Update expense set category_id = '$category_id' , item = '$item' , price = '$price' , details = '$details' 
                        , expense_date = '$expense_date' where id = $id";
            }
                mysqli_query($con,$sql);
                redirect('expense.php');
                }
           
        
        ?>
        <div class="container">
          <div class="sign-in-container">
            <form method="post">
              <?php echo getCategory($category_id) ?>
              <input type="date" placeholder="Expense date" name="expense_date" required value="<?php echo $expense_date ?>"><br>
              <input type="text" placeholder="Price" name="price" required value="<?php echo $price ?>">
              <input type="text" placeholder="Item" name="item" required value="<?php echo $item ?>"><br>
              <textarea placeholder="Details" name="details" rows="4" cols="50" required><?php echo $details ?></textarea><br>
              <button class="form_btn" name="submit"><?php echo $button ?></button>
             </form> 
          </div>
        </div>
  




<?php
 include ('footer.php');
?>
