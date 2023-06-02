<?php 
namespace App\Models;

class Model
{
	public static function select(string $table, string $columns='*'){
		$query = "SELECT $columns FROM $table";
		$result = mysqli_query($Database->getConnection(), $query);
		if($result->num_rows > 0 ){
			$data = [];
			while ($info = mysqli_fetch_assoc($result)) {
				$data[] = $info;
			}
			return $data;
		}
		else{
			return 'No Data found.';
		}
	}

	public static function insert(string $table, array $data){
		$values = implode("', '", $data);
		$columns = array_flip($data);
		$columns = implode(", " , $columns);
		$query = "INSERT INTO $table($columns) VALUES('".$values."')";
		$result = mysqli_query($Database->getConnection(), $query);
	}

	public static function update(string $table, array $set, array $where= null){
		
		$setColumn = '';
		$whereColumnIs = '';
		foreach ($set as $column => $value) {
			$setColumn .= "$column = '$value', ";
		 }
		$column = substr($setColumn, 0, -2);
		foreach($where as $columnIs => $valueIs)
		{
			$whereColumnIs .= "$columnIs = '$valueIs', ";
		}
		$whereColumnIs = substr($whereColumnIs, 0, -2);
		$query = "UPDATE $table SET $column WHERE $whereColumnIs";
		$result = mysqli_query($Database->getConnection(), $query);
	}

	public static function delete(string $table , array $where){
		
		$valueIs = implode("', '", $where);
		$columnIs = array_flip($where);
		$columnIs = implode(", ", $columnIs);
		$query = "DELETE FROM $table WHERE $columnIs = '".$valueIs."'";
		$result = mysqli_query($Database->getConnection(), $query);
	}
}