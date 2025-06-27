<?php
session_name("CLIENT_SESSION");
session_start();
$Commande = true;
include_once("Header.php");
include_once("main.php");
$count = 0;

// Insertion de commande
try {
  if (isset($_POST['BtnAjout'])) {
    // Récupération des données
    $Produit = htmlspecialchars($_POST['Fproduit']);
    $Quantite = intval($_POST['NbrProduit']);
    $DateCom = date("Y-m-d"); // format correct
    $Client = $_SESSION['idClient'];

    //  Facultatif : récupérer prix unitaire à partir de TProduit
    $prixRequete = "SELECT PrixProduit FROM TProduit WHERE idProduit = :id";
    $stmtPrix = $pdo->prepare($prixRequete);
    $stmtPrix->execute([':id' => $Produit]);
    $prix = $stmtPrix->fetchColumn();
    $PrixTotal = $prix * $Quantite;

    $data = [
      ':Prod' => $Produit,
      ':Clients' => $Client,
      ':Quant' => $Quantite,
      ':PrixTot' => $PrixTotal,
      ':DateCom' => $DateCom
    ];

    //  Requête correcte avec tous les champs
    $requete = "INSERT INTO TCommande 
                    (Fproduit, Fclient, NbrProduit, PrixTotal, DateCom)
                    VALUES (:Prod, :Clients, :Quant, :PrixTot, :DateCom)";

    $pdostmt = $pdo->prepare($requete);
    $pdostmt->execute($data);
    $pdostmt->closeCursor();

    echo "<div class='alert alert-success text-center'>Commande ajoutée avec succès !</div>";
  }
} catch (PDOException $e) {
  echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
?>

<h1><i class="bi bi-cart"> Faites vos commandes des bons Gateaux avec </i><i class="bi bi-cake2-fill">Cake Art</i></i> Et profiter d'une livraison Rapide<i class="bi bi-truck"></i> </h1>
<div class="text-center p-3 bg-white rounded shadow-sm">
  <a class="btn btn-lg btn-danger" href="LogoutClient.php" role="button"><i class="bi bi-cake2-fill">Deconnexion</i></a>
  <p class="text-dark">
    <i class="bi bi-cart-plus text-primary"></i> Envie de douceur ? Passez votre commande dès maintenant !
  </p>
  <p class="text-secondary">
    <i class="bi bi-box-seam text-info"></i> Nos gâteaux sont faits maison, frais et prêts à être savourés.
  </p>
</div>
<a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill">Cake Art</i></a>

<div class="container form-container bg-white p-4 p-md-5 rounded-3 shadow" style="max-width: 550px;">
  <h2 class="mb-4 text-center text-dark fw-bold">Passer une Commande</h2>

  <!-- php pour prendre les produits dans la bdd -->
  <?php
  include_once("main.php"); // pour la connexion $pdo
  try {
    $stmt = $pdo->query("SELECT idProduit, NomProd
FROM TProduit
WHERE idProduit > 4
ORDER BY idProduit ASC
");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur chargement produits : " . $e->getMessage() . "</div>";
  }
  ?>

  <form name="FormCommande" method="POST" id="orderForm">
    <!-- Champ pour le produit (Fproduit) -->
    <div class="mb-3">
      <label for="productSelect" class="form-label text-secondary fw-medium">Sélectionner un Produit</label>
      <select class="form-select rounded-3 p-3 border-secondary-subtle" id="productSelect" name="Fproduit" required>
        <option selected disabled value="">Choisir le produit</option>
        <?php foreach ($produits as $produit): ?>
          <option value="<?= $produit['idProduit'] ?>"><?= htmlspecialchars($produit['NomProd']) ?></option>
        <?php endforeach; ?>
      </select>

      <div class="form-text text-muted">Sélectionnez le produit que le client souhaite commander.</div>
    </div>

    <!-- Champ pour le nombre de produits (NbrProduit) -->
    <div class="mb-3">
      <label for="quantityInput" class="form-label text-secondary fw-medium">Quantité</label>
      <input type="number" class="form-control rounded-3 p-3 border-secondary-subtle" id="quantityInput" name="NbrProduit" min="1" value="1" required>
      <div class="form-text text-muted">Indiquez la quantité désirée pour le produit sélectionné.</div>
    </div>
    <button type="submit" name="BtnAjout" class="btn btn-primary w-100 mt-4 py-3 rounded-3 fw-bold shadow-sm">Confirmer la Commande</button>
  </form>

  <!-- Message pour l'utilisateur, comme un modal ou une alerte Bootstrap -->
  <div id="messageBox" class="alert alert-info mt-4" style="display:none;"></div>
</div>
<!-- Selection dans la base de donnée -->
<?php
$clientId = $_SESSION['idClient'];

// $Requette = "SELECT * FROM TCommande WHERE Fclient = :clientId ORDER BY DateCom DESC";
$Requette = "SELECT tcommande.idCommande,tproduit.NomProd,tclient.NomClient, tcommande.NbrProduit, tcommande.PrixTotal, tcommande.DateCom FROM tcommande INNER JOIN tproduit on tcommande.Fproduit = tproduit.idProduit inner join tclient on tclient.idClient= tcommande.Fclient WHERE Fclient = :clientId ORDER BY DateCom DESC ";
$pdostmt = $pdo->prepare($Requette);
$pdostmt->execute([':clientId' => $clientId]);

//var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
?>

<!-- Integrer la data tables pour l'affichage des données -->
<table id="datatableCommande" class="display">
  <thead>
    <tr>
      <th>N° Commande</th>
      <th>Produit Commander</th>
      <th>Nombre Produit</th>
      <th>Prix Total </th>
      <th>Date Commande</th>
    </tr>
  </thead>
  <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
    $count++;
  ?>
    <tbody>
      <tr>
        <td><?php echo $ligne["idCommande"] ?></td>
        <td><?php echo htmlspecialchars($ligne["NomProd"]) ?></td>
        <td><?php echo $ligne["NbrProduit"] ?></td>
        <td><?php echo $ligne["PrixTotal"] ?></td>
        <td><?php echo $ligne["DateCom"] ?></td>
      </tr>
    </tbody>
  <?php endwhile; ?>
</table>

<!-- <body class="bg-light d-flex justify-content-center align-items-center min-vh-100 m-0" style="font-family: 'Inter', sans-serif;"> -->

<?php
include_once("Footer.php");
?>