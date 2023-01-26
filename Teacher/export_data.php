<?php
//<!--php de recuperer les informations mtable de reponse et forcer de exporter ces informations on fichier excel avec le nom resultat welsh powell-->

include_once("db_connect.php");
$sql_query = "SELECT id, utilisateur, note, date FROM reponse LIMIT 10";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
$reponse_records = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
	$reponse_records[] = $rows;
}	
if(isset($_POST["export_data"])) {	
	$filename = "ResultWelshPowell".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");	
	$show_coloumn = false;
	if(!empty($reponse_records)) {
	  foreach($reponse_records as $record) {
		if(!$show_coloumn) {
		  // display field/column names in first row
		  echo implode("\t", array_keys($record)) . "\n";
		  $show_coloumn = true;
		}
		echo implode("\t", array_values($record)) . "\n";
	  }
	}
	exit;  
}
?>