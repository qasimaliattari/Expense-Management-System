<?php
include('header.php');
checkUser();
$from="";
$to="";
$sub_sql="";
if(isset($_GET['from'])){
  $from = get_safe_value($_GET['from']);
}
if(isset($_GET['to'])){
$to = get_safe_value($_GET['to']);  
}
if($from!='' && $to!=''){
  $sub_sql .= " and expense.expense_date between '$from' and '$to'"; 
}

$res = mysqli_query($con,"select 
                          expense.price,category.name,expense.item,expense.expense_date from expense,category
                          where expense.category_id=category.id $sub_sql ");

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
          <div class="dashboard_bar">Dashboard Report</div>
        </div>
      </div>
    </nav>
  </div>
</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<div class="container">
  <?php if($from!="" && $to!=""){?>
  <form method ="get">
    <input type="" name="from" disabled style="background-color:rgba(255, 255, 0, 0.836);"  value="<?php echo $from ?>"> <b>-></b>
    <input type="" name="to" disabled style="background-color:rgba(255, 255, 0, 0.836);" value="<?php echo $to ?>">
  </form>
  <?php } ?>
<?php if(mysqli_num_rows($res)>0){  ?>
  
  <table class="neumorphic">
    <thead>
      <tr>
        <th>Category</th>
        <th>Item</th>
        <th>Expense Date</th>
        <th>Prcie</th>
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
        <td><?php echo $row['item'];?></td>
        <td><?php echo $row['expense_date'];?></td>
        <td><?php echo $row['price'];?></td>
      </tr>
	<?php  
    } ?>
	 <tr>
        <th></th>
        <th></th>
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



