<?php

require_once('database.php');
class Model extends Database{
	// Create Records
	public function create($table,$data){
		$sql = "";
		$sql .="INSERT INTO ".$table." (".implode(",", array_keys($data)).") VALUES (:".implode(", :", array_keys($data)).")";
		$stmt = $this->con->prepare($sql);
		foreach($data as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		if($stmt->execute($binding))
			{echo json_encode("Record saved");}
		else
			{echo json_encode("Failed !Try again");}
	}

	// select all records method
	public function select_all_records($table){
		$sql="";
		$array = array();
		$sql = "SELECT * FROM ".$table;
		$stmt = $this->con->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$array[] = $row;
		}
		return $array;
	}

// Select one record
	public function select_one_record($table, $where){
		$sql = "";
		$array = array();
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key.="='".$value."'";
		}
		$sql = "SELECT * FROM ".$table." WHERE ".$condition;
		$stmt = $this->con->prepare($sql);
		$stmt->execute();
		while ($row = $stmt->fetch()) {
			$array[] = $row;
		}
		return $array;
			// echo json_encode($where);
	}


		// Update Records
	public function update($table, $data, $where){
		$sql = "";
		$condition="";
		foreach ($data as $key => $value) {
			$sql .= $key."=:".$key.", ";
		}
		foreach ($where as $key => $value) {
			$condition .= $key."=:".$key." AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql = substr($sql, 0,-2);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		// echo $sql;
		foreach($data as $field => $value) {
			$binding[':'.$field]=htmlspecialchars(strip_tags($value));
		}
		$stmt = $this->con->prepare($sql);
		if($stmt->execute($binding))
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	// /Delete records
	public function delete($table,$where){
		$sql="";
		$condition="";
		foreach ($where as $key => $value) {
			$condition .= $key."='".$value."' AND "; 	
		}
		$condition = substr($condition, 0,-5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;
		$stmt = $this->con->prepare($sql);
		
		if($stmt->execute()){
			return true;
		}
	}		
}


