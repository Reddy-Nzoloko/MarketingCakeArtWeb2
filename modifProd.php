<?php 
include_once("Header.php");
include_once("main.php");

try {
    // Traitement du formulaire de modification
    if (isset($_POST["BtnModif"])) {
        $idOriginal = $_POST["myid"];
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
                ':idProduit' => $idOriginal,
                ':NomProd' => $nom,
                ':CategorieProd' => $categorie,
                ':TypeProd' => $type,
                ':PrixProd' => $prix,
                ':DateEntreProd' => $dateEntrer,
                ':DateExpiration' => $dateExpiration,
                ':PhotoProd' => $destination
            ];

            $requete = "UPDATE TProduit 
                        SET NomProd=:NomProd, CategorieProd=:CategorieProd, TypeProd=:TypeProd, PrixProd=:PrixProd, 
                            DateEntreProd=:DateEntreProd, DateExpiration=:DateExpiration, PhotoProd=:PhotoProd 
                        WHERE idProduit=:idProduit";
            $pdostmt = $pdo->prepare($requete);
            $pdostmt->execute($data);

            echo "<div class='alert alert-success text-center'>Produit modifié avec succès !</div>";
        } else {
            echo "<div class='alert alert-danger'>Erreur lors du téléchargement de l'image.</div>";
        }
    }

    // Affichage du produit à modifier
    if (!empty($_GET["idProduit"])) {
        $requete = "SELECT * FROM TProduit WHERE idProduit=:id";
        $pdostmt = $pdo->prepare($requete);
        $pdostmt->execute(["id" => $_GET["idProduit"]]);
        $row = $pdostmt->fetch(PDO::FETCH_ASSOC);
        $pdostmt->closeCursor();
        
        if ($row):
          
?>

<h1><i class="bi bi-gift"></i> Modification Gâteau <i class="bi bi-pencil-fill"></i></h1>
<form class="row g-3" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="myid" value="<?php echo htmlspecialchars($row["idProduit"]); ?>">

    <div class="col-md-6">
        <label class="form-label">N° Produit</label>
        <input type="number" class="form-control" id="inpNum" name="inpNum" value="<?php echo htmlspecialchars($row["idProduit"]); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Nom produit</label>
        <input type="text" class="form-control" id="InpNom" name="InpNom" value="<?php echo htmlspecialchars($row["NomProd"]); ?>" required>
    </div>
    <div class="col-12">
        <label class="form-label">Catégorie</label>
        <select class="form-control" id="inpCategorie" name="inpCategorie" required>
            <option value="">-- Sélectionnez --</option>
            <option value="Disponible" <?php if($row["CategorieProd"] == "Disponible") echo "selected"; ?>>Disponible</option>
            <option value="Indisponible" <?php if($row["CategorieProd"] == "Indisponible") echo "selected"; ?>>Indisponible</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label">Type Produit</label>
        <select class="form-control" id="inpType" name="inpType" required>
            <option value="">-- Sélectionnez --</option>
            <option value="Mariage" <?php if($row["TypeProd"] == "Mariage") echo "selected"; ?>>Mariage</option>
            <option value="Anniversaire" <?php if($row["TypeProd"] == "Anniversaire") echo "selected"; ?>>Anniversaire</option>
            <option value="Autre Ceremonie" <?php if($row["TypeProd"] == "Autre Ceremonie") echo "selected"; ?>>Autre Cérémonie</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Prix Produit</label>
        <input type="number" step="0.01" class="form-control" id="inpPrix" name="inpPrix" value="<?php echo htmlspecialchars($row["PrixProd"]); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Date Fabrication</label>
        <input type="date" class="form-control" id="inpDateEntrer" name="inpDateEntrer" value="<?php echo htmlspecialchars($row["DateEntreProd"]); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Date Expiration</label>
        <input type="date" class="form-control" id="inpDateExpiration" name="inpDateExpiration" value="<?php echo htmlspecialchars($row["DateExpiration"]); ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Photo produit</label>
        <input type="file" class="form-control" id="inpPhoto" name="inpPhoto" required>
    </div>
    <div class="col-12">
        <button type="submit" id="BtnModif" name="BtnModif" class="btn btn-primary">Modifier</button>
    </div>
</form>

<?php
        else:
            echo "<div class='alert alert-warning'>Produit introuvable.</div>";
        endif;
    }

} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}

include_once("Footer.php");
?>
