<?php 

session_start();

require "config.php";
require "classes/bootstrap.php";
require "classes/controller.php";

require "classes/messages.php";

require "classes/model.php";


require "controllers/HomeController.php";
require "controllers/UserController.php";
require "controllers/ShareController.php";

require "models/home.php";
require "models/user.php";
require "models/share.php";

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller)
{
	$controller->executeAction();
}