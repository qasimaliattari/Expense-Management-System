<?php
include('header.php');
checkUser();

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){

   $id = get_safe_value($_GET['id']);
   mysqli_query($con,"delete from category where id=$id");
   
}

$res = mysqli_query($con,"select * from category order by id desc");

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
          <div class="dashboard_bar">Category</div>
        </div>
      </div>
    </nav>
  </div>
</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<div class="container">
<a href="manage_category.php"><button>Add category</button></a>
<?php if(mysqli_num_rows($res)>0){  ?>
  
  <table class="neumorphic">
    <thead>
      <tr>
        <th>ID</th>
        <th>NAME</th>
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
		<td>
			<a href="manage_category.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a>
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
		echo "<b>no data found</b> ";
	 }
   ?>
  
</div>
<?php
 include ('footer.php');
?>



