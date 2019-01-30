
<html>
   <head>
      <title>Provab</title>
   </head>
   
   <body>
      <?php
      require_once('model.php');
      $where = ['status'=>1];
      $obj_Model = new Model();
      $data = $obj_Model->select_one_record('employee_tbl', $where);

$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$date = $date->format('d-m-Y');
$dbmatch = explode("-",$date);
$today = $dbmatch[0].'/'.$dbmatch[1];
$dobArray = array();
$emailArray = array();
$dobName = array();
$nameArray = array();
$allemail = array();
foreach ($data as $row) {
     $dobArray[] = $row['dob'];
     $emailArray[] = $row['email'];
     $nameArray[] = $row['emp_name'];
     $allemail[] = $row['email'];
} 

  for ($i=0; $i < count($dobArray); $i++) { 
  	if($today==$dobArray[$i]){
		 // $message = "Happy Birth Day to ".$nameArray[$i]." on ".$dobArray[$i]." Email: ".$emailArray[$i];
		 $message = "Happy Birth Day to <b>".$nameArray[$i]."</b> on <b>".$date.'</b>';
		 echo "<br><br><br>";
  		$where = ['status'=>1];
		  $data = $obj_Model->select_one_record('employee_tbl', $where);
  		foreach ($data as $row) {
  	 	echo 'Email To:<b> '.$row['email'].'</b> '.$message.'<br></h2>';
  }

  	}
  }
      ?>
      
   </body>
</html>

