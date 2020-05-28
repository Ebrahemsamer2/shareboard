<?php 

class Bootstrap
{
	private $controller;
	private $action;
	private $request;

	public function __construct($request)
	{
		$this->request = $request;
		if($this->request['controller'] == "")
		{
			$this->controller = 'home';
		}
		else
		{
			$this->controller = $request['controller'];
		}

		if($this->request['action'] == "")
		{
			$this->action = 'index';
		}
		else
		{
			$this->action = $request['action'];
		}
	}

	public function createController()
	{
		if(class_exists($this->controller))
		{
			$parents = class_parents($this->controller);

			// check if class extends from the Controller
			if(in_array("Controller", $parents))
			{
				if(method_exists($this->controller, $this->action))
				{
					return new $this->controller($this->action, $this->request);
				}
				else
				{
					// method does not exist
					echo "Method Does not exist";
					return;
				}
			} 
			else
			{
				// Main Controller does not exist
				echo "Base Controller Does not found";
				return;
			}
		}
		else
		{
			echo $this->controller . " class does not exist";
			return;
		}
	}
}