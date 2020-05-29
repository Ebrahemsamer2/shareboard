<?php 

class UserModel extends Model
{
	public function login()
	{
		if(isset($_POST['login']))
		{
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

			$this->query("SELECT * FROM users WHERE email = :email");
			$this->bind(":email", $email);

			$this->execute();
			$result = $this->result()[0];

			if(password_verify($password, $result->password))
			{	
				$_SESSION['id'] = $result->id;
				$_SESSION['username'] = $result->username;
				$_SESSION['email'] = $result->email;
				header("Location: /");
			}
		}
	}

	public function register()
	{
		if(isset($_POST['register']))
		{
			$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			
			if( strlen($title) < 7 )
			{
				Message::setMessage("Password must be greater than 6 characters", "error");
			}

			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			$cols = ['username', 'email', 'password'];
			$vals = [$username, $email, $hashed_password];

			if($this->insert("users", $cols, $vals))
			{
				$_SESSION['id'] = $this->lastInsertedId();
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				header("Location: /");
			}
		}
	}

	public function logout()
	{
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		session_destroy();
		header("Location: /");
	}
}