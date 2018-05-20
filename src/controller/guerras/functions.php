<?php		
require_once '../config.php';
require_once DBAPI;
$guerras = null;
$guerra = null;
/**	 *  Listagem de Clientes	 */	
function index() {
	global $guerras;
	$guerras = find_all_gue('guerras');
}

function add(){
	if (!empty($_POST['guerra'])) {
		$guerra = $_POST['guerra'];
		save('guerras', $guerra);
		header('location: guerras.php');
	}
}

function edit() {
	if (isset($_GET['id'])) {	
		$id = $_GET['id'];
		if (isset($_POST['guerra'])) {
			$guerra = $_POST['guerra'];
			update('guerras', $id, $guerra);
			header('location: guerras.php');
		} else {
			global $guerra;	
			$guerra = findgue('guerras', $id);
		} 
	} else {
		header('location: guerras.php');
	}
}

	function delete($id = null) {
		global $guerra;
		$guerra = remove('guerras', $id);	
		header('location: guerras.php');
	}