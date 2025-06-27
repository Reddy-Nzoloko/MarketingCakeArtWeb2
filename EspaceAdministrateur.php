<?php
session_name("ADMIN_SESSION");
session_start();
// Ici, tu peux vérifier si $_SESSION['user_id'] est bien défini
$Article = true;
include_once("Header.php");
include_once("main.php");
$count = 0;
?>
<section class="bg">
    <div class="container">
        <h1 class="h1">Espace Administrateur</h1>
        <a class="btn btn-outline-danger" href="Logout.php"> <i class="bi bi-box-arrow-right"></i>Déconnexion</a>

    </div>
</section>
<section>
    <h3>
        <i class="bi bi-gift"> Affichage de gateaux <i class="bi bi-cake2-fill">Cake Art</i></i>
    </h3>
    <a href="AjoutProduit.php" class="btn btn-primary"> <i class="bi bi-folder-plus"></i> </a>
    <!-- Selection dans la base de donnée -->
    <?php
    $Requette = "SELECT * FROM tproduit";
    $pdostmt = $pdo->prepare($Requette);
    $pdostmt->execute();
    //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <!-- Integrer la data tables pour l'affichage des données -->
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered display nowrap">
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

                <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
                    $count++;
                ?>
                    <tr>
                        <td><?php echo $ligne["idProduit"] ?></td>
                        <td><?php echo $ligne["NomProd"] ?></td>
                        <td><?php echo $ligne["CategorieProd"] ?></td>
                        <td><?php echo $ligne["TypeProd"] ?></td>
                        <td><?php echo $ligne["PrixProd"] ?></td>
                        <td><?php echo $ligne["DateEntreProd"] ?></td>
                        <td><?php echo $ligne["DateExpiration"] ?></td>
                        <td><?php echo "<img width='100' src='" . $ligne["PhotoProd"] . "'>"; ?></td>
                        <td>
                            <a href="modifProd.php?idProduit=<?php echo $ligne['idProduit']; ?>" class="btn btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $count ?>"> <i class="bi bi-trash3"></i> </button>
                        </td>
                    </tr>
                    <!-- Modal pour confirmer la suppresion d'un client -->
                    <!-- Modal -->
                    <div class="modal fade" id="DeleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
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
                                    <a href="DeleteProd.php?idProduit=<?php echo $ligne['idProduit']; ?>" class="btn btn-danger">Confirmer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php
    $pdo = new connect()
    ?>
</section>

<!-- Gestion des client dans la base de donnée espace admin -->
<section>
    <!-- Selection dans la base de donnée -->
    <?php
    $Requette = "SELECT * FROM tclient";
    $pdostmt = $pdo->prepare($Requette);
    $pdostmt->execute();
    //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <div class="container">
        <h1><i class="bi bi-person-circle"></i> Clients </h1>
        <a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill"></i> Cake Art</a>
    </div>
    </main>
    <!-- Integrer la data tables pour l'affichage des données -->
    <div class="table-responsive container">
        <table id="datatables" class="table table-bordered display nowrap">
            <thead>
                <tr>
                    <th>N° Client</th>
                    <th>Nom complet</th>
                    <th>Phone Client</th>
                    <th>Adresse Mail</th>
                    <th>Mot de pass</th>
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                <<!-- Selection dans la base de donnée -->
                    <?php
                    $Requette = "SELECT * FROM tclient";
                    $pdostmt = $pdo->prepare($Requette);
                    $pdostmt->execute();
                    //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
                    ?>
                    <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
                        $count++;
                    ?>
                        <tr>
                            <td><?php echo $ligne["idClient"] ?></td>
                            <td><?php echo $ligne["NomClient"] ?></td>
                            <td><?php echo $ligne["PhoneClient"] ?></td>
                            <td><?php echo $ligne["MailClient"] ?></td>
                            <td><?php echo $ligne["passWordClient"] ?></td>
                            <td>
                                <a href="ModifClient.php?idClient=<?php echo $ligne['idClient']; ?>" class="btn btn-success"> <i class="bi bi-pencil-fill"></i> </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $count ?>"> <i class="bi bi-trash3"></i> </button>
                            </td>
                            <!-- Modal pour confirmer la suppresion d'un client -->
                            <!-- Modal -->
                            <div class="modal fade" id="DeleteModal<?php echo $count ?>" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-trash2">Suppression</i></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez vous vraiment supprimer ce client?? <i class="bi bi-trash4"></i>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <a href="SuppresionClient.php?idClient=<?php echo $ligne['idClient']; ?>" class="btn btn-danger">Confirmer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>
<!-- Espance Agent ou administrateur -->
<section>
    <div class="container">
        <h2 class="h1"> Administrateur <i class="bi bi-person"></i></h2>
        <h4 class="h3"> Admin</h4>
        <a class="h2" href="AjoutAgent.php"><i class="bi bi-person-plus"></i></a>
        <a class="h2" href="AfficherAgent.php"><i class="bi bi-eye"></i>
        </a>

    </div>
</section>
<!-- Espace Commande -->
<!-- Selection dans la tables commande -->
<<!-- Selection dans la base de donnée -->
    <?php
    $Requette = "SELECT tcommande.idCommande,tproduit.NomProd,tclient.NomClient, tcommande.NbrProduit, tcommande.PrixTotal, tcommande.DateCom FROM tcommande INNER JOIN tproduit on tcommande.Fproduit = tproduit.idProduit inner join tclient on tclient.idClient= tcommande.Fclient  ORDER BY DateCom DESC";
    $pdostmt = $pdo->prepare($Requette);
    $pdostmt->execute();

    ?>
    <section>
        <div class="container">
            <h2><i class="bi bi-cart"> Commandes des Gateaux </i><i class="bi bi-cake2-fill">Cake Art</i></i><i class="bi bi-truck"></i> </h2>
            <div class="text-center p-3 bg-white rounded shadow-sm">
            </div>
            <a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill">Cake Art</i></a>
            <!-- Integrer la data tables pour l'affichage des données -->
            <div class="table-responsive">
                <table id="datatableCom" class="table table-bordered display nowrap">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>Produits</th>
                            <th> Client </th>
                            <th>Quantité</th>
                            <th>Prix Total</th>
                            <th> Date commande</th>
                        </tr>
                    </thead>
                    <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
                        $count++;
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $ligne["idCommande"] ?></td>
                                <td><?php echo $ligne["NomProd"] ?></td>
                                <td><?php echo $ligne["NomClient"] ?></td>
                                <td><?php echo $ligne["NbrProduit"] ?></td>
                                <td><?php echo $ligne["PrixTotal"] ?></td>
                                <td><?php echo $ligne["DateCom"] ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                </table>
            </div>
        </div>
        </div>
    </section>
    <?php
    include_once("Footer.php");
    ?>