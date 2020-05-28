<?php 

require "config.php";
require "classes/bootstrap.php";

require "classes/controller.php";
require "classes/model.php";

require "controllers/HomeController.php";
require "controllers/UserController.php";
require "controllers/ShareController.php";

require "models/HomeModel.php";
require "models/UserModel.php";
require "models/ShareModel.php";

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller)
{
	$controller->executeAction();
}