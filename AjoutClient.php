<!-- Introduction de la connexion et le header -->
<?php
include_once("Header.php");
include_once("main.php");

//CREATE TABLE IF NOT EXISTS TClient(idClient int primary key, NomClient VARCHAR(300) not null, MailClient VARCHAR(300) NOT NULL, PhoneClient VARCHAR(300) NOT NULL);

//Ajout du client dans la bdd
try {

    if (isset($_POST['BtnModif'])) {
        // Récupération des données
        $num = htmlspecialchars($_POST['Num']);
        $nom = htmlspecialchars($_POST['Nom']);
        $NumeroPhone = htmlspecialchars($_POST['NumPhone']);
        $AdresseMail = htmlspecialchars($_POST['Email']);
        //$MotPass = htmlspecialchars($_POST['Pass']);
        $data = [
            ':idClient' => $num,
            ':NomClient' => $nom,
            ':NumPhone' =>  $NumeroPhone,
            ':MailC' => $AdresseMail,
            //':PassC' => $MotPass,
        ];

        $requete = "INSERT into TClient
                (idClient, NomClient, PhoneClient, MailClient) 
                values 
                (:idClient, :NomClient, :NumPhone, :MailC)";

        $pdostmt = $pdo->prepare($requete);
        $pdostmt->execute($data);
        $pdostmt->closeCursor();
        echo "<div class='alert alert-success text-center'>Client ajouté avec succès !</div>";
    }
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
?>




<!-- Formulaire d'ajout du client -->
<div id="FormAjout">
    <h3 class="text-center mb-4">Ajout d'un client</h3>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">N° Client</label>
            <input type="text" class="form-control" id="Num" name="Num" placeholder="Votre N°" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Votre nom" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="tel" class="form-control" id="NumPhone" name="NumPhone" placeholder="Numéro de téléphone" required>
        </div>
        <div class="mb-3">
            <label for="registerEmail" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="registerEmail" name="Email" placeholder="Entrez votre e-mail" required>
        </div>
        <!-- <div class="mb-3">
            <label for="registerPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="registerPassword" name="Pass" placeholder="Mot de passe" required>
        </div> -->
        <div class="d-grid mb-2">
            <button type="submit" name="BtnModif" class="btn btn-success ">Créer le compte</button>
        </div>
        <!-- <div class="d-grid">
            <button type="button" class="btn btn-outline-secondary" onclick="toggleForms()">J'ai déjà un compte</button>
          </div> -->
    </form>
</div>
<!-- Pied de page -->
<?php
include_once("Footer.php");
?>