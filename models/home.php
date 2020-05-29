<?php 

class HomeModel extends Model
{
	public function index()
	{
		$this->query("SELECT * FROM shares");
		$shares = $this->result();
		return $shares;
	}
}