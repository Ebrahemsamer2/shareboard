<?php 

class Messages
{
	public static function setMessage($message, $type)
	{
		if($type == "error")
		{
			$_SESSION['error'] = $message;
		}
		else
		{
			$_SESSION['success'] = $message;
		}
	}

	public static function display()
	{
		if(isset($_SESSION['error']))
		{
			echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
		}
		else
		{
			echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
		}
	}
}