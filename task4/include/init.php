<?php

require_once("classes/Autoloader.php");

Autoloader::init();

global $db;
$db = new \DB\Connection(new \DB\Configs\Common());
