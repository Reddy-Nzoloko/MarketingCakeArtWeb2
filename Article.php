<?php
    $Article = true;
    include_once("Header.php");
    include_once("main.php");
    $count =0;
?>


    <h1><i class="bi bi-gift"> Faites des Surprises à vos proches avec <i class="bi bi-cake2-fill">Cake Art</i></i>  </h1>
    <a href="AjoutProduit.php" class="btn btn-primary"> <i class="bi bi-folder-plus"></i> </a>
    <p class="lead">Avec un bon prix <i class="bi bi-tag"></i> Chez <i class="bi bi-cake2-fill">Cake Art</i>, chaque gâteau est une œuvre d’art sucrée<i class="bi bi-emoji-smile"></i>.
    Préparés avec des ingrédients frais et de qualité,
    produits allient goût raffiné et présentation élégante.
    Le moelleux<i class="bi bi-cupcake"></i>, la saveur et l'équilibre <i class="bi bi-emoji-smile"></i>parfait du sucre font toute la différence.
    Une seule bouchée suffit pour vous faire revenir ! 🍰💫 </p>
    <a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill">Cake Art</i></a>

    <!-- Selection dans la base de donnée -->
    <?php
        $Requette = "SELECT * FROM tproduit";
        $pdostmt=$pdo->prepare($Requette);
        $pdostmt->execute();
        //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
        <!-- Integrer la data tables pour l'affichage des données -->
        <table id="datatable" class="display">
    <thead>
        <tr>
            <th>N° Produit</th>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Date</th>
            <th>Date Expiration</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php while($ligne =$pdostmt->fetch(PDO::FETCH_ASSOC)):
            $count ++;
        ?>
        <tr>
            <td><?php echo $ligne["idProduit"]?></td>
            <td><?php echo $ligne["NomProd"]?></td>
            <td><?php echo $ligne["CategorieProd"]?></td>
            <td><?php echo $ligne["TypeProd"]?></td>
            <td><?php echo $ligne["PrixProd"]?></td>
            <td><?php echo $ligne["DateEntreProd"]?></td>
            <td><?php echo $ligne["DateExpiration"]?></td>
            <td><?php echo "<img width='100' src='".$ligne["PhotoProd"]."'>";?></td>
            <td>
                 <a href="modifProd.php?idProduit=<?php echo $ligne["idProduit"]?>" class="btn btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $count?>"> <i class="bi bi-trash3"></i> </button>
            </td>
        </tr>
        <!-- Modal pour confirmer la suppresion d'un client -->
            <!-- Modal --> 
            <div class="modal fade" id="DeleteModal<?php echo $count?>"tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash2">Suppression</i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Voulez vous vraiment supprimer ce produits?? <i class="bi bi-trash4"></i> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <!-- Action qui fonctionne comme evenement au gliss de la souris = -->
                    <a href="deleteProd.php?idProduit=<?php echo $ligne["idProduit"]?>" class="btn btn-danger" >Confirmer</a>
                </div>
                </div>
            </div>
            </div>
        <?php endwhile;?>
    </tbody>
</table>
  </div>
</main>
<?php 
    $pdo = new connect()
?>
<?php
include_once("Footer.php");
?>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
