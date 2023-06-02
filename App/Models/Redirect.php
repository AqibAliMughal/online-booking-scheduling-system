<?php 
namespace App\Models;

class Redirect
{
	public static function home(){
		header("location:/");
	}

	public static function to(string $page, array $queryString=null){
		if( !empty($queryString) ){
			$queryStringData = '';
			foreach ($queryString as $variable => $message){
				$queryStringData .= "?$variable=$message&"; 
			}
			$queryStringData =substr($queryStringData, 0, -1);
			header("location:$page.php$queryStringData");
		}
		else{
			header("location:$page.php");
		}
	}
}


