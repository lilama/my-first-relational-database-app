<?php
    //Get the data.
    require("postAndSanitize.php");
    
    $id = postAndSanitize("id");
    $date = postAndSanitize("date");
    $societe = postAndSanitize("societe");
    $contact = postAndSanitize("contact");
    $objet = postAndSanitize("objet");
    errorMessage($errorArray, "index");
    
    //Update an Invoice
    
    try{
        $pdo = new PDO('mysql:host=100.115.92.2:8080;dbname=cogip;charset=utf8', 'root', '');
    }catch(Exception $error){
        die("erreur :" . $error->getMessage());
    }
    $prep = $pdo->prepare(
        "UPDATE
            factures
        SET
            dateFact=:date,
            objet=:objet,
            societes_id=:societe,
            personnes_id=:contact
        WHERE
            id=:id;"
    );
    $prep->bindParam(":date", $date);
    $prep->bindParam(":objet",$objet);
    $prep->bindParam(":societe", $societe);
    $prep->bindParam(":contact", $contact);
    $prep->bindParam(":id", $id);
    $prep->execute();
    $prep->closeCursor();
    header("Location: index.php");
?>