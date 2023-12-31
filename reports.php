<?php
include('header.php');
checkUser();
$cat_id = '';
$sub_sql = '';
$from = '';
$to = '';
if(isset($_GET['category_id']) && $_GET['category_id']>0){

  $cat_id = get_safe_value($_GET['category_id']);
  $sub_sql = "and category.id = $cat_id";
}

if(isset($_GET['category_id'])){
  $from = get_safe_value($_GET['from']);
}
if(isset($_GET['to'])){
$to = get_safe_value($_GET['to']);  
}
if($from!='' && $to!=''){
  $sub_sql .= " and expense.expense_date between '$from' and '$to'"; 
}

$res = mysqli_query($con,"select 
                          sum(expense.price) as price , category.name from expense,category
                          where expense.category_id = category.id $sub_sql
                          group by expense.category_id");

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
          <div class="dashboard_bar">Reports</div>
        </div>
      </div>
    </nav>
  </div>
</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<div class="container">
  <form method ="get">
    <input type="date" name="from" required value="<?php echo $from ?>"> <b>-></b>
    <input type="date" name="to" required value="<?php echo $to ?>">
    <?php echo getCategory( $cat_id , 'reports') ?>
    <button  class="form_btn" name="submit">Submit</button>
  </form>
  <a href="reports.php"><button  class="form_btn">Reset</button></a>


<?php if(mysqli_num_rows($res)>0){  ?>
  
  <table class="neumorphic">
    <thead>
      <tr>
        <th>Category</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
	<?php 
    $final_price = 0;
    while($row=mysqli_fetch_assoc($res)){
      $final_price = $final_price + $row['price'];
  ?>
      <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['price'];?></td>
      </tr>
	<?php  
    } ?>
	 <tr>
        <th>Total</th>
        <th><?php echo $final_price ?></th>
      </tr>
    </tbody>
  </table>
  <?php }
     else{
		echo "<b>no data found</b> ";
	 }
   ?>
  
</div>
<?php
 include ('footer.php');
?>



