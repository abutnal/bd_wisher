<?php
require_once('model.php');
class Controller{
	public function create(){
		$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
		$date = $date->format('d-m-Y h:i:s');
		$data = [
			'emp_id'=>$_POST['emp_id'],
			'emp_name'=>$_POST['emp_name'],
			'phone'=>$_POST['phone'],
			'email'=>$_POST['email'],
			'dob'=>$_POST['dob'],
			'address'=>$_POST['address'],
			'joining_date'=>$_POST['joining_date'],
			'designation'=>$_POST['designation'],
			'photo'=>$_FILES['photo']['name'],
			'created_at'=>$date];
	// echo json_encode($data);
			$obj_Model = new Model();
			$obj_Model->create('employee_tbl',$data);
		}


		public function select_all_records(){
			$obj_Model = new Model();
			$data = $obj_Model->select_all_records('employee_tbl');
			$count = 1;	
			$html = "";
			$html .= '<thead>';
			$html .= '<th>SL</th>';
			$html .= '<th>Emp_ID</th>';
			$html .= '<th>Emp_Name</th>';
			$html .= '<th>Emp_Phone</th>';
			$html .= '<th>Emp_Email</th>';
			$html .= '<th>Emp_Status</th>';
			$html .= '<th>Image</th>';
			$html .= '<th style="text-align: center;">Action</th>';
			$html .= '</thead>';

			foreach ($data as $row) {
				$html .= '<tr >';
				$html .= '<td>'.$count++.'</td>';
				$html .= '<td>'.$row['emp_id'].'</td>';
				$html .= '<td>'.$row['emp_name'].'</td>';
				$html .= '<td>'.$row['phone'].'</td>';
				$html .= '<td>'.$row['email'].'</td>';
				$html .= '<td>';
				if ($row['status']==1) {
					$html .= '<a href="" id="status" emp-status="0" user-data="'.$row['id'].'" class="btn btn-success btn-xs">Active</a>';
				}
				if ($row['status']==0) {
					$html .= '<a href="" id="status" emp-status="1" user-data="'.$row['id'].'" class="btn btn-warning btn-xs">Deactive</a>';
				}

				$html .= '</td>';
				$html .= '<td><img src="assets/image/'.$row['photo'].'"  class="image" id="'.$row['id'].'" user-data="'.$row['id'].'" alt="">';
				$html .= '</td>';
				$html .= '<td align="right"><a href="" data-toggle="modal" id="edit" user-data="'.$row['id'].'" data-target="#updateProfileModal" class="btn btn-primary btn-xs">Edit</a>&nbsp&nbsp<a href="" id="delete" user-data="'.$row['id'].'" class="btn btn-danger btn-xs">Delete</a></td>';

				$html .= '</tr>';
			}
			echo json_encode($html);
		}

		
    // Select_one_record
		public function select_one_record(){
			$where = ['id'=>$_POST['id']];
			$obj_Model = new Model();
			$data = $obj_Model->select_one_record('employee_tbl', $where);
			foreach ($data as $row) {
				$id = $row['id'];
				$emp_id = $row['emp_id'];
				$emp_name = $row['emp_name'];
				$phone = $row['phone'];
				$email = $row['email'];
				$dob = $row['dob'];
				$address = $row['address'];
				$joining_date = $row['joining_date'];
				$designation = $row['designation'];
				$status = $row['status'];
				$leaving_date = $row['leaving_date'];
				$photo = $row['photo'];
			}
			$html = '';
			$html .= '<form action="controller.php" method="POST" id="updateProfileForm" enctype="multipart/form-data">';
			$html .= '<div class="modal-body">';
			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_ID</label>';
			$html .= '<input type="hidden" name="UpdateProfile" value="UpdateProfile" id="UpdateProfile">';
			$html .= '<input type="hidden" name="id" value="'.$id.'" id="UpdateProfile">';
			$html .= '<input type="text" name="emp_id" id="emp_id" value="'.$emp_id.'"  class="form-control">';
			$html .= '</div></div>';

			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_Name</label>';
			$html .= '<input type="text" name="emp_name" id="emp_name" value="'.$emp_name.'"  class="form-control">';
			$html .= '</div></div>';

			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Phone</label>';
			$html .= '<input type="text" name="phone" id="phone" value="'.$phone.'"  class="form-control">';
			$html .= '</div></div>';
			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Email</label>';
			$html .= '<input type="text" name="email" id="email" value="'.$email.'"  class="form-control">';
			$html .= '</div></div>';



			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Date of Birth</label>';
			$html .= '<input type="text" name="dob" id="dob" value="'.$dob.'"  class="form-control">';
			$html .= '</div></div>';

			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Address</label>';
			$html .= '<input type="text" name="address" id="address" value="'.$address.'"  class="form-control">';
			$html .= '</div></div>';

			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Joining Date</label>';
			$html .= '<input type="text" name="joining_date" id="joining_date" value="'.$joining_date.'"  class="form-control">';
			$html .= '</div></div>';

			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Designation</label>';
			$html .= '<input type="text" name="designation" id="designation" value="'.$designation.'"  class="form-control">';
			$html .= '</div></div>';


			$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Leaving Date</label>';
			$html .= '<input type="text" name="leaving_date" id="leaving_date" value="'.$leaving_date.'"  class="form-control">';
			$html .= '</div></div>';



			$html .= '<input type="hidden" name="path" value="'.$photo.'" id="path">';
			$html .= '<div class="col-md-12"><div class="form-group"><img src="assets/image/'.$photo.'" width="50px" height="50px">';
			$html .= '<input type="file" name="photo" id="photo" placeholder="Photo" class="form-control">';
			$html .= '</div></div>';
			
			$html .= '<div class="modal-footer">';
			$html .= '<div class="col-md-12">';
			$html .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
			$html .= '<button type="submit" class="btn btn-primary">Save changes</button>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</form>';
			echo json_encode($html);
		}



		public function update(){
			
			if (empty($_FILES['photo']['name'])) {
				$path = $_POST['path'];
			}
			else{
				$path = $_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/image/'.basename($_FILES['photo']['name']));
			}
			$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
			$date = $date->format('d-m-Y h:i:s');
			$data = [  
				'id'=>$_POST['id'],
				'emp_id'=>$_POST['emp_id'],
				'emp_name'=>$_POST['emp_name'],
				'phone'=>$_POST['phone'],
				'email'=>$_POST['email'],
				'dob'=>$_POST['dob'],
				'address'=>$_POST['address'],
				'joining_date'=>$_POST['joining_date'],
				'leaving_date'=>$_POST['leaving_date'],
				'designation'=>$_POST['designation'],
				'photo'=>$path,
				'created_at'=>$date

			];
       // echo json_encode($data);     
			$where = ['id'=>$_POST['id']];
			$obj_Model = new Model();
			$data = $obj_Model->update('employee_tbl', $data, $where);
			if ($data) {
				echo json_encode('updated');
			}
			if($obj_Model->select_one_record('employee_tbl', $where)){
				$message = '<div class="alert alert-dismissible alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Well done!</strong> You successfully Updated profile.
				</div>';
				echo $message;
			}
		}


		public function delete(){
			$where = ['id'=>$_POST['id']];
			$obj_Model = new Model();
    	// echo json_encode($where);
			$data = $obj_Model->delete('employee_tbl', $where);
			if ($data) {
				echo json_encode("Deleted");
			}
		}

	}
	$obj_Controller = new Controller();


	if (isset($_POST['addNewEmp'])) {
		$obj_Controller->create();
	}

	if (isset($_POST['showRecords'])) {
		$obj_Controller->select_all_records();
	}


	if (isset($_POST['showEditRecords'])) {
		$obj_Controller->select_one_record();
	}

	if (isset($_POST['UpdateProfile'])) {
		$obj_Controller->update();
	}

	if (isset($_POST['deleteRecords'])) {
		$obj_Controller->delete();
	// echo json_encode('Hello');
	}

	if (isset($_POST['showSelectedRecords'])) {
		$where = ['id'=>$_POST['id']];
		$obj_Model = new Model();
		$data = $obj_Model->select_one_record('employee_tbl', $where);
		foreach ($data as $row) {
			$html = '<div class="row"><div class="col-md-12"> <img src="assets/image/'.$row['photo'].'" class="profile-image"></div>     <div class="col-md-12"><b>Emp_ID:</b> '.$row['emp_id'].'</div><div class="col-md-12"><b>Emp_Name:</b> '.$row['emp_name'].'</div><div class="col-md-12"><b>Phone:</b> '.$row['phone'].'</div><div class="col-md-12"><b>Email:</b> '.$row['email'].'</div>
			
			<div class="col-md-12"><b>DOB:</b> '.$row['dob'].'</div>
			<div class="col-md-12"><b>Emp_Address:</b> '.$row['address'].'</div>
			<div class="col-md-12"><b>Emp_Joining Date:</b> '.$row['joining_date'].'</div>
			<div class="col-md-12"><b>Emp_Designation:</b> '.$row['designation'].'</div>
			</div>';
		}
		echo json_encode($html);
	}



	if (isset($_POST['StatusEmp'])) {
		$where = ['id'=>$_POST['id']];
		$data = ['id'=>$_POST['id'], 'status'=>$_POST['status']];
		echo json_encode($data);
	// $data = $obj->status('employee_tbl', $where);
		$obj_Model = new Model();
		$status = $obj_Model->update('employee_tbl', $data, $where);
		if($status){
			echo 'status';
		}
		
	}












// require_once('model.php');
// if (isset($_POST['showRecords'])) {
// $count = 1;	
// $html = "";
// $html .= '<thead>';
// $html .= '<th>SL</th>';
// $html .= '<th>Emp_ID</th>';
// $html .= '<th>Emp_Name</th>';
// $html .= '<th>Emp_Phone</th>';
// $html .= '<th>Emp_Email</th>';
// $html .= '<th>Emp_Status</th>';
// $html .= '<th>Image</th>';
// $html .= '<th style="text-align: center;">Action</th>';
// $html .= '</thead>';
// $data = $obj->select_all('employee_tbl');
// foreach ($data as $row) {
// $html .= '<tr >';
// $html .= '<td>'.$count++.'</td>';
// $html .= '<td>'.$row['emp_id'].'</td>';
// $html .= '<td>'.$row['emp_name'].'</td>';
// $html .= '<td>'.$row['phone'].'</td>';
// $html .= '<td>'.$row['email'].'</td>';
// $html .= '<td>';
// if ($row['status']==1) {
// 	$html .= '<a href="" id="status" emp-status="0" user-data="'.$row['id'].'" class="btn btn-success btn-xs">Active</a>';
// }
// if ($row['status']==0) {
// 	$html .= '<a href="" id="status" emp-status="1" user-data="'.$row['id'].'" class="btn btn-warning btn-xs">Deactive</a>';
// }

// $html .= '</td>';
// $html .= '<td><img src="assets/image/'.$row['photo'].'"  class="image" id="'.$row['id'].'" user-data="'.$row['id'].'" alt="">';
// $html .= '</td>';
// $html .= '<td align="right"><a href="" data-toggle="modal" id="edit" user-data="'.$row['id'].'" data-target="#updateProfileModal" class="btn btn-primary btn-xs">Edit</a>&nbsp&nbsp<a href="" id="delete" user-data="'.$row['id'].'" class="btn btn-danger btn-xs">Delete</a></td>';

// $html .= '</tr>';
// }
// echo json_encode($html);
// }


// if (isset($_POST['showSelectedRecords'])) {
// 	$where = ['id'=>$_POST['id']];
// 	$data = $obj->select_where('employee_tbl', $where);
// 	foreach ($data as $row) {
// 		$html = '<div class="row"><div class="col-md-12"> <img src="assets/image/'.$row['photo'].'" class="profile-image"></div>     <div class="col-md-12"><b>Emp_ID:</b> '.$row['emp_id'].'</div><div class="col-md-12"><b>Emp_Name:</b> '.$row['emp_name'].'</div><div class="col-md-12"><b>Phone:</b> '.$row['phone'].'</div><div class="col-md-12"><b>Email:</b> '.$row['email'].'</div>
	
// 		<div class="col-md-12"><b>DOB:</b> '.$row['dob'].'</div>
// 		<div class="col-md-12"><b>Emp_Address:</b> '.$row['address'].'</div>
// 		<div class="col-md-12"><b>Emp_Joining Date:</b> '.$row['joining_date'].'</div>
// 		<div class="col-md-12"><b>Emp_Designation:</b> '.$row['designation'].'</div>
// 		</div>';
// 	}
// 	echo json_encode($html);
// }

// if (isset($_POST['showEditRecords'])) {
// 	$where = ['id'=>$_POST['id']];
// 	$data = $obj->select_where('employee_tbl', $where);
// 	foreach ($data as $row) {
// 		$id = $row['id'];
// 		$emp_id = $row['emp_id'];
// 		$emp_name = $row['emp_name'];
// 		$phone = $row['phone'];
// 		$email = $row['email'];
// 		$dob = $row['dob'];
// 		$address = $row['address'];
// 		$joining_date = $row['joining_date'];
// 		$designation = $row['designation'];
// 		$status = $row['status'];
// 		$leaving_date = $row['leaving_date'];
// 		$photo = $row['photo'];
// 	}
// 	$html = '';
// 	$html .= '<form action="controller.php" method="POST" id="updateProfileForm" enctype="multipart/form-data">';
// 	$html .= '<div class="modal-body">';
// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_ID</label>';
// 	$html .= '<input type="hidden" name="UpdateProfile" value="UpdateProfile" id="UpdateProfile">';
// 	$html .= '<input type="hidden" name="id" value="'.$id.'" id="UpdateProfile">';
// 	$html .= '<input type="text" name="emp_id" id="emp_id" value="'.$emp_id.'"  class="form-control">';
// 	$html .= '</div></div>';

// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Emp_Name</label>';
// 	$html .= '<input type="text" name="emp_name" id="emp_name" value="'.$emp_name.'"  class="form-control">';
// 	$html .= '</div></div>';

// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Phone</label>';
// 	$html .= '<input type="text" name="phone" id="phone" value="'.$phone.'"  class="form-control">';
// 	$html .= '</div></div>';
// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Email</label>';
// 	$html .= '<input type="text" name="email" id="email" value="'.$email.'"  class="form-control">';
// 	$html .= '</div></div>';



// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Date of Birth</label>';
// 	$html .= '<input type="text" name="dob" id="dob" value="'.$dob.'"  class="form-control">';
// 	$html .= '</div></div>';

// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Address</label>';
// 	$html .= '<input type="text" name="address" id="address" value="'.$address.'"  class="form-control">';
// 	$html .= '</div></div>';

// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Joining Date</label>';
// 	$html .= '<input type="text" name="joining_date" id="joining_date" value="'.$joining_date.'"  class="form-control">';
// 	$html .= '</div></div>';

// 	$html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Designation</label>';
// 	$html .= '<input type="text" name="designation" id="designation" value="'.$designation.'"  class="form-control">';
// 	$html .= '</div></div>';


//    $html .= '<div class="col-md-12"><div class="form-group"><label for="" class="label">Leaving Date</label>';
// 	$html .= '<input type="text" name="leaving_date" id="leaving_date" value="'.$leaving_date.'"  class="form-control">';
// 	$html .= '</div></div>';



// 	$html .= '<input type="hidden" name="path" value="'.$photo.'" id="path">';
// 	$html .= '<div class="col-md-12"><div class="form-group"><img src="assets/image/'.$photo.'" width="50px" height="50px">';
// 	$html .= '<input type="file" name="photo" id="photo" placeholder="Photo" class="form-control">';
// 	$html .= '</div></div>';
	
// 	$html .= '<div class="modal-footer">';
// 	$html .= '<div class="col-md-12">';
// 	$html .= '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
// 	$html .= '<button type="submit" class="btn btn-primary">Save changes</button>';
// 	$html .= '</div>';
// 	$html .= '</div>';
// 	$html .= '</form>';
// 	echo json_encode($html);
// }


// if (isset($_POST['addNewEmp'])) {
// 	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
// 	$date = $date->format('d-m-Y h:i:s');
// 	$data = [
// 		'emp_id'=>$_POST['emp_id'],
// 		'emp_name'=>$_POST['emp_name'],
// 		 'phone'=>$_POST['phone'],
// 	    'email'=>$_POST['email'],
// 		'dob'=>$_POST['dob'],
// 		'address'=>$_POST['address'],
// 		'joining_date'=>$_POST['joining_date'],
// 		'designation'=>$_POST['designation'],
// 	 'photo'=>$_FILES['photo']['name'],
// 	 'created_at'=>$date];
// 	 // echo json_encode($data);
// 	if($obj->insert('employee_tbl', $data)){
// 		move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/image/'.basename($_FILES['photo']['name']));
// 		$message = '<div class="alert alert-dismissible alert-success">
//   <button type="button" class="close" data-dismiss="alert">&times;</button>
//   <strong>Well done!</strong> You successfully added new employee details.
// </div>';
// 		echo json_encode($message);
// 	}
// }


// if (isset($_POST['UpdateProfile'])) {
// 	if (empty($_FILES['photo']['name'])) {
// 		$path = $_POST['path'];
// 	}
// 	else{
// 		$path = $_FILES['photo']['name'];
// 		move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/image/'.basename($_FILES['photo']['name']));
// 	}
// 	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
// 	$date = $date->format('d-m-Y h:i:s');
//     $data = [
//     			'emp_id'=>$_POST['emp_id'],
//     			'emp_name'=>$_POST['emp_name'],
//     			'phone'=>$_POST['phone'],
//     			'email'=>$_POST['email'],
//     			'dob'=>$_POST['dob'],
//     			'address'=>$_POST['address'],
//     			'joining_date'=>$_POST['joining_date'],
//     			'leaving_date'=>$_POST['leaving_date'],
//     			'designation'=>$_POST['designation'],
//     			'photo'=>$path,
//     			'created_at'=>$date
//             ];
// 	$where = ['id'=>$_POST['id']];
// 	if($obj->update('employee_tbl', $data, $where)){
// 		$message = '<div class="alert alert-dismissible alert-success">
//   <button type="button" class="close" data-dismiss="alert">&times;</button>
//   <strong>Well done!</strong> You successfully Updated profile.
// </div>';
// 		echo json_encode($message);
// 	}
// }


// if (isset($_POST['deleteRecords'])) {
// 	$where = ['id'=>$_POST['id']];
// 	$data = $obj->delete('employee_tbl', $where);
// 	// echo json_encode($where);
// }

// if (isset($_POST['StatusEmp'])) {
// 	$where = ['id'=>$_POST['id']];
// 	$data = ['status'=>$_POST['status']];
// 	// $data = $obj->status('employee_tbl', $where);
// 	$status = $obj->update('employee_tbl', $data, $where);
//  if($status){
//  	echo json_encode('status');
//  }
	
// }