<?php
include_once("Header.php");
include_once("main.php");


// code d'insertion dans la tables des gateaux
try {

  if (isset($_POST['BtnAjout'])) {
    // Récupération des données
    $num = htmlspecialchars($_POST['inpNum']);
    $nom = htmlspecialchars($_POST['InpNom']);
    $categorie = htmlspecialchars($_POST['inpCategorie']);
    $type = htmlspecialchars($_POST['inpType']);
    $prix = htmlspecialchars($_POST['inpPrix']);
    $dateEntrer = $_POST['inpDateEntrer'];
    $dateExpiration = $_POST['inpDateExpiration'];
    $photoName = $_FILES['inpPhoto']['name'];
    $photoTmp = $_FILES['inpPhoto']['tmp_name'];
    $destination = "telechargement/" . $photoName;

    if (move_uploaded_file($photoTmp, $destination)) {
      $data = [
        ':idProduit' => $num,
        ':NomProd' => $nom,
        ':CategorieProd' => $categorie,
        ':TypeProd' => $type,
        ':PrixProd' => $prix,
        ':DateEntreProd' => $dateEntrer,
        ':DateExpiration' => $dateExpiration,
        ':PhotoProd' => $destination
      ];

      $requete = "INSERT into TProduit
                (idProduit, NomProd, CategorieProd, TypeProd, PrixProd, DateEntreProd, DateExpiration, PhotoProd) 
                values 
                (:idProduit, :NomProd, :CategorieProd, :TypeProd, :PrixProd, :DateEntreProd, :DateExpiration, :PhotoProd)";

      $pdostmt = $pdo->prepare($requete);
      $pdostmt->execute($data);
      // $pdostmt->execute([
      //     "idProduit"=>$_POST['inpNum'],"NomProd"=>$_POST['InpNom'],"CategorieProd"=>$_POST['inpCategorie'], "TypeProd"=>$_POST['inpType'],"PrixProd"=>$_POST['inpPrix'],
      //     "DateEntreProd"=>$_POST['inpDateEntrer'],"DateExpiration"=>$_POST['inpDateExpiration'],"PhotoProd"=>$destination
      // ]);
      $pdostmt->closeCursor();
      echo "<div class='alert alert-success text-center'>Produit ajouté avec succès !</div>";
    } else {
      echo "<div class='alert alert-danger text-center'>Erreur lors du téléchargement de l'image.</div>";
    }
  }
} catch (PDOException $e) {
  // Vérifie si c’est une erreur utilisateur (SQLSTATE '45000')
  if ($e->getCode() === '45000') {
    echo "Erreur : " . $e->getMessage();  // Affichera : Impossible de commander un produit indisponible
  } else {
    // Autres erreurs SQL
    echo "Erreur SQL : " . $e->getMessage();
  }
}
?>

<h1 class="mt-5">Ajout des Produits</h1>
<form class="row g-3" method="POST" action="" enctype="multipart/form-data">
  <div class="col-md-6">
    <label class="form-label">N° Produit</label>
    <input type="number" class="form-control" id="inpNum" name="inpNum" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Nom produit</label>
    <input type="text" class="form-control" id="InpNom" name="InpNom" required>
  </div>
  <div class="col-12">
    <label class="form-label">Catégorie</label>
    <select class="form-control" id="inpCategorie" name="inpCategorie" required>
      <option value=""> Sélectionnez la catégorie</option>
      <option value="Disponible">Disponible</option>
      <option value="Indisponible">Indisponible</option>
    </select>
  </div>
  <div class="col-12">
    <label class="form-label">Type Produit</label>
    <select class="form-control" id="inpType" name="inpType" required>
      <option value="">Sélectionnez le type </option>
      <option value="Mariage">Mariage</option>
      <option value="Anniversaire">Anniversaire</option>
      <option value="Autre Ceremonie">Autre Cérémonie</option>
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label">Prix Produit</label>
    <input type="number" step="0.01" class="form-control" id="inpPrix" name="inpPrix" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Date Fabrication</label>
    <input type="date" class="form-control" id="inpDateEntrer" name="inpDateEntrer" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Date Expiration</label>
    <input type="date" class="form-control" id="inpDateExpiration" name="inpDateExpiration" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Photo produit</label>
    <input type="file" class="form-control" id="inpPhoto" name="inpPhoto" required>
  </div>
  <div class="col-12">
    <button type="submit" id="BtnAjout" name="BtnAjout" class="btn btn-primary">Ajouter Produit</button>
  </div>
</form>

<?php
include_once("Footer.php");
?>