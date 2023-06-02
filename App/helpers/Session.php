<?php 
namespace App\Models;

class Session
{
	public static function start():bool{
		return session_start();
	}

	public static function set(string $variable, mixed $value):mixed{
		return $_SESSION["$variable"]  = $value;
	}

	public static function unset(string $session){
		if( $_SESSION["$session"] ){
			unset($_SESSION["$session"]);
			return true;
		}
		else{
			return "Session variable doesn't exit.";
		}
	}

	public static function destroy():bool{
		return session_destroy();
	}
}