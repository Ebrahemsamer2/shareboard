<?php 

class UserModel extends Model
{
	public function index()
	{
		$shares = $this->getAll("users");
		return $shares;
	}
}