<?php
include_once("Header.php");
include_once("main.php");
//Ajout du client dans la bdd
try {

    if (isset($_POST['BtnModif'])) {
        // Récupération des données
        $num = htmlspecialchars($_POST['Num']);
        $nom = htmlspecialchars($_POST['Nom']);
        $NumeroPhone = htmlspecialchars($_POST['NumPhone']);
        $AdresseMail = htmlspecialchars($_POST['Email']);
        $MotPas = htmlspecialchars($_POST['MotPass']);
        $MotPassHache = password_hash($MotPas, PASSWORD_DEFAULT);
        $data = [
            ':idClient' => $num,
            ':NomClient' => $nom,
            ':NumPhone' =>  $NumeroPhone,
            ':MailC' => $AdresseMail,
            ':Pass' => $MotPassHache,
        ];

        $requete = "UPDATE TClient 
        SET NomClient=:NomClient,PhoneClient=:NumPhone, MailClient=:MailC, passWordClient=:Pass
        WHERE idClient=:idClient";
        $pdostmt = $pdo->prepare($requete);
        $pdostmt->execute($data);
        $pdostmt->closeCursor();
        echo "<div class='alert alert-success text-center'>Client ajouté avec succès !</div>";
    }

    // Affichage du produit à modifier
    if (!empty($_GET["idClient"])) {
        $requetes = "SELECT * FROM TClient WHERE idClient=:id";
        $pdostmt = $pdo->prepare($requetes);
        $pdostmt->execute(["id" => $_GET["idClient"]]);
        $row = $pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->closeCursor();

        if ($row):

?>
            <!-- Formulaire d'ajout du client -->
            <div id="FormAjout">
                <h3 class="text-center mb-4">Modification des informations sur le client</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">N° Client</label>
                        <input type="text" class="form-control" id="Num" name="Num" value="<?php echo htmlspecialchars($row["idClient"]); ?>" placeholder="Votre N°" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo htmlspecialchars($row["NomClient"]); ?>" placeholder="Votre nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="NumPhone" name="NumPhone" value="<?php echo htmlspecialchars($row["PhoneClient"]); ?>" placeholder="Numéro de téléphone" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Adresse e-mail</label>
                        <input type="email" class="form-control" id="registerEmail" name="Email" value="<?php echo htmlspecialchars($row["MailClient"]); ?>" placeholder="Entrez votre e-mail" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPass" class="form-label">Mot de pass</label>
                        <input type="password" class="form-control" id="registerPass" name="MotPass" value="<?php echo htmlspecialchars($row["passWordClient"]); ?>" placeholder="Entrez votre Password" required>
                    </div>
                    <div class="d-grid mb-2">
                        <button type="submit" name="BtnModif" class="btn btn-success ">Modifier</button>
                    </div>
                </form>
            </div>

            <!-- Pied de page -->
<?php
        else:
            echo "<div class='alert alert-warning'>Client introuvable.</div>";
        endif;
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
include_once("Footer.php");
?>