<?php
    //Get the data.
    require("postAndSanitize.php");
    
    $date = postAndSanitize("date");
    $societe = postAndSanitize("societe");
    $contact = postAndSanitize("contact");
    $objet = postAndSanitize("objet");
    errorMessage($errorArray, "index");
    
    //Create an invoice
    try{
        $pdo = new PDO('mysql:host=100.115.92.2:8080;dbname=cogip;charset=utf8', 'root', '');
    }catch(Exception $error){
        die("erreur :" . $error->getMessage());
    }
    $prep = $pdo->prepare(
        "SELECT COUNT(*)
        FROM
            factures;"
    );
    $prep->execute();
    $number = $prep->fetch();
    $prep->closeCursor();
    
    function createInvoiceNumber($date, $numberOfInvoices){
        $invoiceNumber = substr($date, 0, 5);
        for($i = 0; $i < (5-strlen($numberOfInvoices[0])); $i++){
           $invoiceNumber .= "0";
        }
        $invoiceNumber .= $numberOfInvoices[0] + 1;
        return($invoiceNumber);
    }
    $invoiceNumber = createInvoiceNumber($date, $number);
    $prep = $pdo->prepare(
        "INSERT INTO factures
            (numero, dateFact, objet, societes_id, personnes_id)
        VALUES
            (:invoiceNumber, :date, :objet, :societe, :contact);"
    );
    $prep->bindValue(":invoiceNumber", $invoiceNumber);
    $prep->bindValue(":date", $date);
    $prep->bindValue(":objet", $objet);
    $prep->bindValue(":societe", $societe);
    $prep->bindValue(":contact", $contact);
    $prep->execute();
    $prep->closeCursor();
    header("Location: index.php");
?>