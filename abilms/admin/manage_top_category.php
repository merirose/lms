<?php 
session_start(); 
if(!isset($_SESSION["username"])){
	header("location: login.php");
}

include "../connection.php";
$msg="";
if(isset($_GET["delete_id"])){
// $text_top_category_name=mres($con,$_POST["text_top_category_name"]);
// $text_top_category_order=mres($con,$_POST["text_top_category_order"]);
$qry=mysqli_query($con, "delete from table_top_category where top_category_id='".mres($con,$_GET["delete_id"])."'");
if($qry){
	$msg='
		<div id="login-alert" class="alert alert-success col-sm-12">Success! Data is deleted</div>
	';
}
else {
	$msg='
		<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot delete data</div>
	';
}
}
?>
<?php
include "header.php";

?>
	<div class="row" style="padding-left: 0px;padding-right: 0px;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="padding-left: 0px;padding-right: 0px;">
				<?php include "left_menu.php";?>
			</div>

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="well">
					<form method="post" class="form-inline" id="form_search" action='<?php echo $_SERVER["PHP_SELF"];?>'>
					  <div class="form-group">
					    <label>Search By Name:</label>
					   		<input type="text" class="form-control" id="text_search" name="text_search">
					  </div>
  					<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Manage Top Category</div>
					</div>

						<div class="panel-body">
							<?php echo $msg;?>
			  <table class="table table-hover table-bordered">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Top Category</th>
			        <th>Top Category Order</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php
			    	$qry=mysqli_query($con,"select * from table_top_category order by top_category_order asc");
			    	while($row=mysqli_fetch_array($qry)) {
			    		echo '<tr>';
			    		echo '<td>'.$row["top_category_id"]."</td><td>".$row["top_category_name"]."</td><td>".$row["top_category_order"]."</td><td>Edit | <a href='?delete_id=".$row["top_category_id"]."' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a></td>";
			    		echo '</tr>';
			    	}
			    	?>

			    </tbody>
			  </table>


						</div>
		</div>

	</div>

</div>
<script>
	$(document).ready(function(){
			$('input[class="form-control"]').focus(function(){
			$(this).removeAttr('style');
			});

	  $("#btn_save").click(function(e){
	 	if($('#text_top_category_name').val()==''){
	 		$('#text_top_category_name').css("border-color", "#DA190B");
	 		$('#text_top_category_name').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	if($('#text_top_category_order').val()==''){
	 		$('#text_top_category_order').css("border-color", "#DA190B");
	 		$('#text_top_category_order').css("background", "#F2DEDE");
	 		e.preventDefault();
	 	}
	 	else{
	 		$('form_add_top_category').unbind('submit').submit();
	 	}
	  });

	  // $("#btn_password").click(function(e){
	 	// if($('#password').val()==''){
	 	// 	$('#password').css("border-color", "#DA190B");
	 	// 	$('#password').css("background", "#F2DEDE");
	 	// 	e.preventDefault();
	 	// }
	 	// else{
	 	// 	$('form_password').unbind('submit').submit();
	 	// }
	  // });

	});
</script>
<?php include "footer.php"; ?>