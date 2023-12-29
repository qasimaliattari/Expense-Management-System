<?php
include('header.php');
checkUser();

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){

   $id = get_safe_value($_GET['id']);
   mysqli_query($con,"delete from expense where id=$id");
   
}

$res = mysqli_query($con,"select expense.* , category.name from expense,category
                          where expense.category_id = category.id
                          order by expense.expense_date asc");

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
          <div class="dashboard_bar">Expense</div>
        </div>
      </div>
    </nav>
  </div>
</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<div class="container">
<a href="manage_expense.php"><button>Add expense</button></a>
<?php if(mysqli_num_rows($res)>0){  ?>
  
  <table class="neumorphic">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Item</th>
        <th>Price</th>
        <th>Details</th>
        <th>Expense Date</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
	<?php while($row=mysqli_fetch_assoc($res)){
     ?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['item'];?></td>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['details'];?></td>
        <td><?php echo $row['expense_date'];?></td>
		<td>
			<a href="manage_expense.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
		</td>
    <td>
    <a href="?type=delete&id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash-can"></i></a>
    </td>
      </tr>
	<?php  
    } ?>
	 
    </tbody>
  </table>
  <?php }
     else{
		echo "no data found ";
	 }
   ?>
  
</div>
<?php
 include ('footer.php');
?>



