<?php 

class ShareModel extends Model
{
	public function index()
	{
		$shares = $this->getAll("shares");
		return $shares;
	}
}