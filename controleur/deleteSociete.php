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
					echo " 15 false testNombre : " . $_POST[$entree];
	 				$retour = $entree . 'non_sanitise';
	 				return $retour;		
				} else if ($entree == 'numTel' || $entree == 'pays') {
					return $retour = validate($entree,$type);
				}			
			} else {
				echo " 14 false videNombre : " . $_POST[$entree] . '<br/>';
	 			$retour = $entree . 'vide';
	 			return $retour;
			}
		} else {
			echo " 12 false existNombre : " . $_POST[$entree] . '<br/>';
	 		$retour = $entree . 'non_saisi';
	 		return $retour;
	 	}
	}

	if (isset($_POST['submit'])) {
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
		if (!empty(testErreur('typeEntrepriseID', 'nombre'))) {
			$error[] = testErreur('typeEntrepriseID', 'nombre');	
		}
		if (!empty(testErreur('tnom', 'string'))) {
			$error[] = testErreur('tnom', 'string');	
		}
	} else {
		$error[] = 'Formulaire non soumis';
	}

	echo 'nombre erreur: ' . count($error);
	var_dump($error);

	if (count($error) > 0) {
		echo "Bonjour 10 erreur";
		$string = "../vue/editSociete.php?societe=". $_GET["societe"] . "&status=false";
		foreach ($error as $cle=>$valeur) {
			$string .= "&" . $valeur . "=false";
			header("Location: ". $string);
		}
	} else {
		$snomNettoye = sanitiser('snom','string');
		$adresseNettoye = sanitiser('adresse','string');
		$paysNettoye = sanitiser('pays','string');
		$numTvaNettoye = sanitiser('numTva','string');
		$numTelNettoye = sanitiser('numTel','string');
		$typeEntreprise_idNettoye = sanitiser('typeEntrepriseID','nombre');
		$tnomNettoye = sanitiser('tnom','string');
		header("Location:../vue/editSociete.php?societe=". $_GET["societe"] . "&status=true");
		include "../modele/editSociete.php";
	}
?>