<?php
	$error = array();

	function sanitiser($entree,$type){
		if ($type == 'string') {
			return filter_var($_POST[$entree], FILTER_SANITIZE_STRING);	
		} else if ($type == 'nombre') {
			return filter_var($_POST[$entree], FILTER_SANITIZE_NUMBER_INT);
		}		
	}

	function validate($entree,$type) {
		if ($entree == 'pays') {
			$pattern = "/^[a-zA-Z'. -]+$/";	
		} else if ($entree == 'numTel') {
			$pattern = "/^[0-9\-\(\)\/\+\s]*$/";
		}
		$nettoye = sanitiser($entree,$type);		
		$match = preg_match($pattern, $nettoye);
    	if(!$match) {
    		$retour = $entree . 'invalide';
	 		return $retour;
    	}
	}

	function testErreur($entree,$type) {
		if (isset($_POST[$entree])) {
			if (!empty($_POST[$entree])) {
				if (is_bool(sanitiser($entree,$type)) || empty(sanitiser($entree,$type))) {
					$retour = $entree . 'non_sanitise';
	 				return $retour;		
				} else if ($entree == 'numTel' || $entree == 'pays') {
					return $retour = validate($entree,$type);
				}			
			} else {
				$retour = $entree . 'vide';
	 			return $retour;
			}
		} else {
			$retour = $entree . 'non_saisi';
	 		return $retour;
	 	}
	}

	if (isset($_POST['submit'])) {
		if (isset($_GET['societe']) && !empty($_GET['societe']))
		{
			$sidNettoye = filter_var($_GET['societe'], FILTER_SANITIZE_NUMBER_INT);
			if (is_bool($sidNettoye) || empty($sidNettoye)) {
					$error[] = 'societe_non_valide';	
			} 
			if (isset($_GET['status']) && !empty($_GET['status']) && ($_GET['status'] != 'false')) {
					$error[] = 'status_non_valide';		
			}
		}

		if (!empty(testErreur('snom', 'string'))) {
			$error[] = testErreur('snom', 'string');
		}
		if (!empty(testErreur('adresse', 'string'))) {
			$error[] = testErreur('adresse', 'string');	
		}
		if (!empty(testErreur('pays', 'string'))) {
			$error[] = testErreur('pays', 'string');
		}
		if (!empty(testErreur('numTva', 'string'))) {
			$error[] = testErreur('numTva', 'string');	
		}
		if (!empty(testErreur('numTel', 'string'))) {
			$error[] = testErreur('numTel', 'string');	
		}
		if (!empty(testErreur('tnom', 'string'))) {
			$error[] = testErreur('tnom', 'string');	
		}
	} else {
		$error[] = 'Formulaire non soumis';
	}

	if (count($error) > 0) {
		$string = "../vue/editSociete.php?societe=". $_GET["societe"] . "&status=false";
		foreach ($error as $cle=>$valeur) {
			$string .= "&" . $valeur . "=false";
			if ($cle !== 'societe_non_valide' || $cle !== 'status_non_valide') {
				header("Location: ". $string);	
			}			
		}
	} else {
		$snomNettoye = sanitiser('snom','string');
		$adresseNettoye = sanitiser('adresse','string');
		$paysNettoye = sanitiser('pays','string');
		$numTvaNettoye = sanitiser('numTva','string');
		$numTelNettoye = sanitiser('numTel','string');
		$tnomNettoye = sanitiser('tnom','string');
		require "../modele/editSocieteTrueEtape.php";
	}
?>