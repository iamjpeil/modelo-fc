<?php 	  
require_once '../config.php'; 
require_once DBAPI;  
$db = open_database();    
require_once('../controller/guerras/functions.php');
if (isset($_GET['id'])){
	delete($_GET['id']);
} else {	
	die("ERRO: ID não definido.");
}	
?>