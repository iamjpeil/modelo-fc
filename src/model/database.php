<?php		
mysqli_report(MYSQLI_REPORT_STRICT);		
function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);			return $conn;		
	} catch (Exception $e) {
		echo $e->getMessage();			return null;		
	}	
}
function close_database($conn) {
	try {
		mysqli_close($conn);		
	} catch (Exception $e) {
		echo $e->getMessage();		
	}	
}

/**	 *  Pesquisa um Registro pelo ID em uma Tabela	 */
function findfam( $table = null, $id = null ) {
	$database = open_database();
	$found = null;
	try {
		if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
				$found = $result->fetch_assoc();
			}		    		  
		} else {


			//$sql = "SELECT f.id, f.nome, f.quantidade_membros, COUNT(g.id) as guerras  FROM  familias as f INNER JOIN guerras as g where g.id_familia_desafiadora  = f.id  OR g.id_familia_desafiada  = f.id GROUP BY f.id;";


			$sql = "SELECT f.id, f.nome, f.quantidade_membros, COUNT(DISTINCT g1.id) as guerras, COUNT(DISTINCT g2.id) as vitorias, COUNT(DISTINCT g3.id) as derrotas  
			FROM familias as f 
			LEFT JOIN guerras as g1 ON g1.id_familia_desafiadora  = f.id  OR g1.id_familia_desafiada  = f.id
			LEFT JOIN guerras as g2 ON (f.id = g2.id_familia_desafiadora or f.id = g2.id_familia_desafiada) AND
			g2.id_familia_vencedora = f.id
			LEFT JOIN guerras as g3 ON (f.id = g3.id_familia_desafiadora or f.id = g3.id_familia_desafiada)
			AND g3.id_familia_vencedora != f.id
			group by f.id";
			$result = $database->query($sql);
			if ($result->num_rows > 0) {
				$found = $result->fetch_all(MYSQLI_ASSOC);
				/* Metodo alternativo	        
				$found = array();
		        while ($row = $result->fetch_assoc()) {
    	          	array_push($found, $row);	        
	          	}
	            */
	          }
	      }
	  } catch (Exception $e) {
	  	$_SESSION['message'] = $e->GetMessage();
	  	$_SESSION['type'] = 'danger';
	  }	
	  close_database($database);
	  return $found;
	}
	/**	 *  Pesquisa Todos os Registros de uma Tabela	 */	
	function find_all_fam($table) {
		return findfam($table);
	}


	/**	 *  Pesquisa um Registro pelo ID em uma Tabela	 */
	function findgue( $table = null, $id = null ) {
		$database = open_database();
		$found = null;
		try {
			if ($id) {
				$sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
				$result = $database->query($sql);
				if ($result->num_rows > 0) {
					$found = $result->fetch_assoc();
				}		    		  
			} else {




			//$sql = "SELECT * FROM " . $table;

				$sql = "SELECT 
				g.id,
				f1.nome as desafiadora, 
				f2.nome as desafiada,
				f3.nome as vencedora,
				g.data_inicio,
				g.data_fim
				FROM guerras as g 
				INNER JOIN familias as f1 ON g.id_familia_desafiadora = f1.id 
				INNER JOIN familias as f2 ON g.id_familia_desafiada = f2.id 
				INNER JOIN familias as f3 ON g.id_familia_vencedora = f3.id";
				$result = $database->query($sql);
				if ($result->num_rows > 0) {
					$found = $result->fetch_all(MYSQLI_ASSOC);
				/* Metodo alternativo	        
				$found = array();
		        while ($row = $result->fetch_assoc()) {
    	          	array_push($found, $row);	        
	          	}
	            */
	          }
	      }
	  } catch (Exception $e) {
	  	$_SESSION['message'] = $e->GetMessage();
	  	$_SESSION['type'] = 'danger';
	  }	
	  close_database($database);
	  return $found;
	}
	/**	 *  Pesquisa Todos os Registros de uma Tabela	 */	
	function find_all_gue($table) {
		return findgue($table);
	}


	/**	*  Insere um registro no BD	*/	
	function save($table = null, $data = null) {
		$database = open_database();
		$columns = null;
		$values = null;

	  	//print_r($data);	
		foreach ($data as $key => $value) {	    $columns .= trim($key, "'") . ",";
		$values .= "'$value',";
	}
  	// remove a ultima virgula
	$columns = rtrim($columns, ',');
	$values = rtrim($values, ',');
	$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";
	try {	    
		$database->query($sql);
		$_SESSION['message'] = 'Registro cadastrado com sucesso.';
		$_SESSION['type'] = 'success';	
	} catch (Exception $e) {
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';	  
	} 
	close_database($database);	
}

function update($table = null, $id = 0, $data = null) {
	$database = open_database();
	$items = null;
	foreach ($data as $key => $value) {
		$items .= trim($key, "'") . "='$value',";
	}	
  	// remove a ultima virgula
	$items = rtrim($items, ',');
	$sql  = "UPDATE " . $table;
	$sql .= " SET $items";
	$sql .= " WHERE id=" . $id . ";";	
	try {	    $database->query($sql);	
		$_SESSION['message'] = 'Registro atualizado com sucesso.';
		$_SESSION['type'] = 'success';	
	} catch (Exception $e) { 
		$_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
		$_SESSION['type'] = 'danger';
	}
	close_database($database);
}

function remove( $table = null, $id = null ) {	
	$database = open_database();
	try {
		if ($id) {
			$sql = "DELETE FROM " . $table . " WHERE id = " . $id;
			$result = $database->query($sql);	
			if ($result = $database->query($sql)) {  
				$_SESSION['message'] = "Registro Removido com Sucesso.";
				$_SESSION['type'] = 'success';	
			}	
		}	
	} catch (Exception $e) { 
		$_SESSION['message'] = $e->GetMessage();
		$_SESSION['type'] = 'danger';	
	}		  close_database($database);
}
