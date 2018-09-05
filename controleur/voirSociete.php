<?php
	$error = array();

	if (isset($_GET['societe']) && !empty($_GET['societe'])) {
			$sidNettoye = filter_var($_GET['societe'], FILTER_SANITIZE_NUMBER_INT);
			if (is_bool($sidNettoye) || empty($sidNettoye)) {
					$error[] = 'societe_non_valide';	
			} 
	} else if (!isset($_GET["societe"]) || empty($_GET["societe"])) {
		$error[] = 'societe_non_renseigne';
	}

	if (count($error) > 0) {
		$string = "../vue/editSociete.php?status=false";
		foreach ($error as $cle=>$valeur) {
			$string .= "&" . $valeur . "=false";
			if ($cle !== 'societe_non_valide' || $cle !== 'societe_non_renseigne') {
				header("Location:page404.php");	
			}			
		}
	}
?>