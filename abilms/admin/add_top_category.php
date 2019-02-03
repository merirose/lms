<?php 
session_start(); 
if(!isset($_SESSION["username"])){
	header("location: login.php");
}

include "../connection.php";
$msg="";
if(isset($_POST["btn_save"])){
$text_top_category_name=mres($con,$_POST["text_top_category_name"]);
$text_top_category_order=mres($con,$_POST["text_top_category_order"]);
$qry=mysqli_query($con, "insert into table_top_category values('','".$text_top_category_name."','".$text_top_category_order."')");
if($qry){
	$msg='
		<div id="login-alert" class="alert alert-success col-sm-12">Success! Data is inserted</div>
	';
}
else {
	$msg='
		<div id="login-alert" class="alert alert-danger col-sm-12">Fail! Cannot insert data to Database</div>
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
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Add New Top Category</div>
					</div>
						<div class="panel-body">
							<?php echo $msg;?>
							<form id="form_add_top_category" class="form-horizontal" role="form" method="post" action='<?php echo $_SERVER["PHP_SELF"];?>'>
							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Top Category Name</span>
                                    <input type="text" class="form-control" name="text_top_category_name" id="text_top_category_name">                                    
                            </div>
							<div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">Top Category Order</span>
                                    <input type="text" class="form-control" name="text_top_category_order" id="text_top_category_order">                                    
                            </div>
                                <div style="margin-top:10px" class="form-group">
                                	<div class="col-sm-12 controls">
                                      <input type="submit" id="btn_save" name="btn_save" class="btn btn-info btn-block btn-large" value="Save"></a>

                                    </div>
                                </div>
						</form>

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