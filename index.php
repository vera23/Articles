<?php
//
require(__DIR__ . '/autoload.php');
		
$ctrl = !empty($_GET['ctrl']) ? $_GET['ctrl'] : 'News';
$action = !empty($_GET['action']) ? $_GET['action'] : 'All';
$id = !empty($_REQUEST['id']) ? ((int)$_REQUEST['id']) : null;

$CtrlClass = $ctrl . 'Controller';

$ctrl = new $CtrlClass;
$ctrl->action($action,$id);

