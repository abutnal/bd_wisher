<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin | Profile</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jscript.php"></script>
	<style>
		.image{
			height: 50px; width: 50px; border: 1px solid #ddd; padding: 2px;
			cursor: pointer;
		}
		.profile-image{
			max-height: 160px; height: 100%; width:auto; max-width: 160px; border: 1px solid #ddd; padding: 3px; border-radius: 2px;
		}
		td{
			vertical-align: middle !important;
			padding: 2px !important;
			font-size: 14px !important;
		}
		tr{
			border-bottom: 1px solid #ddd !important;
		}
		.modal{
			z-index: 9999 !important;
		}

	.title{font-size: 18px;}
    .panel-heading{padding:6px 0px 6px 12px !important;}
    .form-control{
      border: 1px solid #0d87e9 !important;
      -webkit-box-shadow: inset 0 0px 0 #fff !important; 
       box-shadow: inset 0 0px 0 #fff !important; 
      padding: 22px !important;
      margin-top: -12px;
      color:#333;
    }
    
    body{
    	background: #eee;
    }
    .label{
      margin-left: 18px;
      font-size: 12px; 
      background: #fff;
      color:#0d87e9;
      padding: 0px 3px 0px 3px;
    }
    </style>


</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-md-12 col-md-offset-1">
			<br>
			<a href="#" data-toggle="modal" data-target="#profileModal" class="btn btn-primary pull-left">Add New Employee Details</a>
				<br>
				
		</div>
				
		</div>
		</div>
	<!-- DataTable -->
	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-primary">
				<!-- <div class="panel-heading">Employee Details</div> -->
				<div class="panel-body">
					<table class="table" id="dataTable">
			</table>
				</div>
			</div>
			
		</div>
	</div>
	<!-- End DataTable -->
	</div>

	<!-- Add new profile modal -->
	<div class="modal" id="profileModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Fill Employee Details</h4>
					<div id="msg"></div>
				</div>
				<form action="controller.php" method="POST" id="addEmpForm" enctype="multipart/form-data">
					<input type="hidden" name="addNewEmp" value="addNewEmp" id="addNewEmp">
					<div class="modal-body">
						<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_ID</label>
							<input type="text" name="emp_id" id="emp_id"  class="form-control">
						</div></div>

						<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_Name</label>
							
							<input type="text" name="emp_name" id="emp_name"  class="form-control">
						</div></div>
						<div class="col-md-12"><div class="form-group"><label for="" class="label">Phone</label>
							<input type="text" name="phone" id="phone"  class="form-control">
						</div></div>
						<div class="col-md-12"><div class="form-group"><label for="" class="label">Email</label>
							<input type="text" name="email" id="email"  class="form-control">
						</div></div>

						<div class="col-md-12"><div class="form-group"><label for="" class="label">Date of Birth</label>
							<input type="date" name="dob" id="dob"  class="form-control">
						</div></div>
						<div class="col-md-12"><div class="form-group"><label for="" class="label">Address</label>
							<textarea name="address" id="address"  cols="30" rows="1" class="form-control"></textarea>
						</div></div>

						<div class="col-md-12"><div class="form-group"><label for="" class="label">Joining Date</label>
							<input type="date" name="joining_date" id="joining_date"  class="form-control">
						</div></div>
					<div class="col-md-12"><div class="form-group"><label for="" class="label">Designation</label>
							<input type="text" name="designation" id="designation"  class="form-control">
						</div></div>

						<!-- <div class="col-md-12"><div class="form-group">
							<input type="text" name="status" id="status" placeholder="Status" class="form-control">
						</div></div> -->





						<div class="col-md-12"><div class="form-group"><label for="" class="label">Choose Profile Picture</label>
							<input type="file" name="photo" id="photo" placeholder="Photo" class="form-control">
						</div></div>
						
					</div>
					<div class="modal-footer">
						<div class="col-md-12">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Add Profile</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- End Add new profile modal -->
 


	<!-- Update profile modal -->
	<div class="modal" id="updateProfileModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Update Employee Details</h4>
					<div id="msgUpdate"></div>
				</div>
					<div id="UpdateFormDisplay"></div>
			</div>
		</div>
	</div>
	<!-- Update profile modal -->
</body>
</html>