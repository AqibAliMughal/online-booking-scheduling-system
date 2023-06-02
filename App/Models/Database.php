<?php 
namespace App\Models;

class Database
{
	protected $connection = null;
	public function __construct($database)
	{
		$this->connection = mysqli_connect(
			"localhost", 
			'root',
			'',
			"$database"
		);
	}

	public function getConnection()
	{
		return $this->connection;
	}

	public function query($query)
	{
		$data = [];
		$queryIs = $query;
		$result  = mysqli_query($this->getConnection(), $queryIs);
		/* 
		The 'result' variable could be of type object or boolean, so 
		handled this conditionally. 
		*/
		if ( is_object($result) )
		{
			if($result->num_rows > 0)
			{
				while($info = mysqli_fetch_assoc($result) )
				{
					$data[] = $info;
				}
			}
			return $data;
		}
		else
		{
			$queryResult = $result;
			return $queryResult;
		}
	}
}