<?php 

class ShareModel extends Model
{
	public function index()
	{
		$shares = $this->getAll("shares");
		return $shares;
	}

	public function add()
	{
		if(isset($_POST['addshare']))
		{
			$user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_STRING);
			$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_STRING);
			$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);

			if( strlen($title) < 10 )
			{
				Message::setMessage("Min Length of Title is 10 characters.", "error");
			}

			$cols = ['user_id', 'title', 'body', 'link'];
			$vals = [$user_id, $title, $body, $link];

			if($this->insert("shares", $cols, $vals))
			{
				Message::setMessage("Share Added Successfully", "success");
				header("Location: /shares");
			}
		}
	}
}