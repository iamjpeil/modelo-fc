<?php		
require_once '../config.php';
require_once DBAPI;
$familias = null;
$familia = null;
/**	 *  Listagem de Clientes	 */	
function index() {
	global $familias;
	$familias = find_all_fam('familias');
}

function add(){
	if (!empty($_POST['familia'])) {
		$familia = $_POST['familia'];
		save('familias', $familia);
		header('location: familias.php');
	}
}

function edit() {
	if (isset($_GET['id'])) {	
		$id = $_GET['id'];
		if (isset($_POST['familia'])) {
			$familia = $_POST['familia'];
			update('familias', $id, $familia);
			header('location: familias.php');
		} else {
			global $familia;	
			$familia = findfam('familias', $id);
		} 
	} else {
		header('location: familias.php');
	}
}

function delete($id = null) {
		global $familia;
		$familia = remove('familias', $id);	
		header('location: familias.php');
}