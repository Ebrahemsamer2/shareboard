<?php 

class User extends Controller
{

	protected function index()
	{
		$viewmodel = new UserModel;
		$this->returnView($viewmodel->index(), true);
	}

}