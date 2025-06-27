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

    $requete = "INSERT into TAdministrateur
                (idAdmi, NomAdmi, MailAdmi, PhoneAdmi,Motdepass) 
                values 
                (:idAdm, :NomAdm, :MailC, :NumPhone, :Pass)";

    $pdostmt = $pdo->prepare($requete);
    $pdostmt->execute($data);
    $pdostmt->closeCursor();
    echo "<div class='alert alert-success text-center'>Agent ajouté avec succès !</div>";
  }
} catch (PDOException $e) {
  echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
?>

<form method="POST" class="row">
  <div class="col-6 my-2">
    <label for="nom" class="form-label">N° Agent</label>
    <input name="Num" type="number" class="form-control" id="nom">
  </div>
  <div class="col-6 my-2">
    <label for="nom" class="form-label">Nom</label>
    <input name="Nom" type="text" class="form-control" id="nom">
  </div>
  <div class="col-6 my-2">
    <label for="email" class="form-label">email</label>
    <input name="email" type="email" class="form-control" id="email">
  </div>
  <div class="col-6 my-2">
    <label for="nom" class="form-label">Num Phone</label>
    <input name="NumPhone" type="tel" class="form-control" id="nom">
  </div>
  <div class="col-6 my-2">
    <label for="nom" class="form-label">PassWord </label>
    <input name="MotPass" type="password" class="form-control" id="nom">
  </div>
  <div class="col-12 my-2">
    <button type="submit" name="BtnAjout" class="btn btn-primary w-100 my-2">Envoyer</button>
  </div>
</form>


<?php
include_once("Footer.php");
?>