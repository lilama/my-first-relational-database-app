 <?php
    try{
        $pdo = new PDO('mysql:host=100.115.92.2:8080;dbname=cogip;charset=utf8', 'root', '');
    }catch(Exception $error){
        die("erreur :" . $error->getMessage());
    }
 ?>

<article class="hero">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Ajout d'une facture
            </h1>
        </div>
    </div>
</article>
<form action="crudFacture.php" method="post" class="columns">
    <div class="column is-offset-2 is-4">
        <div class="field">
            <label class="label">Date de la facture</label>
            <div class="control">
                <input name="date" class="input" type="date" placeholder="Date de la facture">
            </div>
            <?php
                if($_GET["date_empty"] == "0"){
                    echo("
                    <p class='help is-danger'>This input is empty.</p>
                    ");
                }elseif($_GET["date_invalid"] == "0"){
                    echo("
                    <p class='help is-danger'>This input is invalid.</p>
                    ");
                }
            ?>
        </div>
        <div class="columns is-multiline ">
            <div class="field column is-half">
                <label class="label">Société</label>
                <select name="societe" class="select">
                    <option></option>
                    <?php
                        $prep = $pdo->prepare(
                            "SELECT
                                id, nom
                            FROM
                                societes;"
                        );
                        $prep->execute();
                        while ($donnees = $prep->fetch()){
                            echo ('<option value = ' . $donnees['id'] . '>' . $donnees['nom'] . '</option>');
                        }
                        $prep->closeCursor();
                     ?>
                </select>
                <?php
                    if($_GET["societe_empty"] == "0"){
                        echo("
                        <p class='help is-danger'>This input is empty.</p>
                        ");
                    }elseif($_GET["societe_invalid"] == "0"){
                        echo("
                        <p class='help is-danger'>This input is invalid.</p>
                        ");
                    }
                ?>
            </div>
            <div class="field column is-half">
                <label class="label">Personne de contact</label>
                <select name="contact" class="select">
                    <option></option>
                    <?php
                        $prep = $pdo->prepare(
                            "SELECT
                                id, nom, prenom
                            FROM
                                personnes;"
                        );
                        $prep->execute();
                        while ($donnees = $prep->fetch()){
                            echo ('<option value = ' . $donnees['id'] . '>' . $donnees['nom'] . " " . $donnees['prenom'] . '</option>');
                        }
                        $prep->closeCursor();
                     ?>
                </select>
                <?php
                    if($_GET["contact_empty"] == "0"){
                        echo("
                        <p class='help is-danger'>This input is empty.</p>
                        ");
                    }elseif($_GET["contact_invalid"] == "0"){
                        echo("
                        <p class='help is-danger'>This input is invalid.</p>
                        ");
                    }
                ?>
            </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <div class="control">
            <button class="button is-rounded">Créer une facture</button>
          </div>
        </div>
    </div>
    <div class="column is-5">
        <div class="field">
            <label class="label">Objet</label>
            <div class="control">
                <textarea name="objet" class="textarea" placeholder="Objet" rows="7"></textarea>
            </div>
            <?php
                if($_GET["object_empty"] == "0"){
                    echo("
                    <p class='help is-danger'>This input is empty.</p>
                    ");
                }elseif($_GET["object_invalid"] == "0"){
                    echo("
                    <p class='help is-danger'>This input is invalid.</p>
                    ");
                }
            ?>
        </div>
    </div>
</form>