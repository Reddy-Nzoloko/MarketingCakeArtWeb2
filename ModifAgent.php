<?php
$Apropos = true;
include_once("Header.php");
include_once("main.php");
$count = 0;
//Ajout du client dans la bdd
try {

    if (isset($_POST['BtnAjout'])) {
        // Récupération des données
        $num = htmlspecialchars($_POST['Num']);
        $nom = htmlspecialchars($_POST['Nom']);
        $NumeroPhone = htmlspecialchars($_POST['NumPhone']);
        $AdresseMail = htmlspecialchars($_POST['email']);
        $MotPas = htmlspecialchars($_POST['MotPass']);
        $MotPassHache = password_hash($MotPas, PASSWORD_DEFAULT);


        //$MotPass = htmlspecialchars($_POST['Pass']);
        $data = [
            ':idAdm' => $num,
            ':NomAdm' => $nom,
            ':NumPhone' =>  $NumeroPhone,
            ':MailC' => $AdresseMail,
            ':Pass' => $MotPassHache,

        ];

        $requete = "UPDATE TAdministrateur
                    Set NomAdmi=:NomAdm,MailAdmi=:MailC,PhoneAdmi=:NumPhone,Motdepass=:Pass
                    Where idAdmi=:idAdm";

        $pdostmt = $pdo->prepare($requete);
        $pdostmt->execute($data);
        $pdostmt->closeCursor();
        echo "<div class='alert alert-success text-center'>Agent modifier avec succès !</div>";
    }


    // Affichage du produit à modifier
    if (!empty($_GET["idAdmi"])) {
        $requetes = "SELECT * FROM TAdministrateur WHERE idAdmi=:id";
        $pdostmt = $pdo->prepare($requetes);
        $pdostmt->execute(["id" => $_GET["idAdmi"]]);
        $row = $pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->closeCursor();

        if ($row):
?>

            <form method="POST" class="row">
                <div class="col-6 my-2">
                    <label for="nom" class="form-label">N° Agent</label>
                    <input name="Num" type="number" value="<?php echo htmlspecialchars($row["idAdmi"]); ?>" class="form-control" id="nom">
                </div>
                <div class="col-6 my-2">
                    <label for="nom" class="form-label">Nom</label>
                    <input name="Nom" type="text" value="<?php echo htmlspecialchars($row["NomAdmi"]); ?>" class="form-control" id="nom">
                </div>
                <div class="col-6 my-2">
                    <label for="email" class="form-label">email</label>
                    <input name="email" type="email" value="<?php echo htmlspecialchars($row["MailAdmi"]); ?>" class="form-control" id="email">
                </div>
                <div class="col-6 my-2">
                    <label for="nom" class="form-label">Num Phone</label>
                    <input name="NumPhone" type="tel" value="<?php echo htmlspecialchars($row["PhoneAdmi"]); ?>" class="form-control" id="nom">
                </div>
                <div class="col-6 my-2">
                    <label for="nom" class="form-label">PassWord </label>
                    <input name="MotPass" type="password" value="<?php echo htmlspecialchars($row["Motdepass"]); ?>" class="form-control" id="nom">
                </div>
                <div class="col-12 my-2">
                    <button type="submit" name="BtnAjout" class="btn btn-primary w-100 my-2">Envoyer</button>
                </div>
            </form>

            <!-- Pied de page -->
<?php
        else:
            echo "<div class='alert alert-warning'>Agent introuvable.</div>";
        endif;
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
include_once("Footer.php");
?>