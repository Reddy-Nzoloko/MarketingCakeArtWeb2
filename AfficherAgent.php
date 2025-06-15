<?php
$Apropos = true;
include_once("Header.php");
include_once("main.php");
$count = 0;
?>
<div class="container">
  <h2 class="h2 text-primary text-center">Listes des agents</h2>

  <div class="table-responsive">
    <table id="datatables" class="table table-bordered display nowrap">
      <thead>
        <tr>
          <th>N° Agent</th>
          <th>Nom Agent</th>
          <th>E-Mail</th>
          <th>Num Phone</th>
          <th>PassWord</th>
          <th>...</th>
        </tr>
      </thead>
      <tbody>
        <!-- selection des commentaire de la bdd -->

        <!-- Selection dans la base de donnée -->
        <?php
        $Requette = "SELECT * FROM TAdministrateur";
        $pdostmt = $pdo->prepare($Requette);
        $pdostmt->execute();
        //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));


        ?>
        <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
          $count++;
        ?>
          <tr>
            <td><?php echo $ligne["idAdmi"] ?></td>
            <td><?php echo $ligne["NomAdmi"] ?></td>
            <td><?php echo $ligne["MailAdmi"] ?></td>
            <td><?php echo $ligne["PhoneAdmi"] ?></td>
            <td><?php echo $ligne["Motdepass"] ?></td>
            <td>
              <a href="ModifAgent.php?idAdmi= <?php echo $ligne["idAdmi"] ?>" class="btn btn-success"> <i class="bi bi-pencil-fill"></i> </a>
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
                    Voulez vous vraiment supprimer cet agent?? <i class="bi bi-trash4"></i>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <!-- Action qui fonctionne comme evenement au gliss de la souris = -->
                    <a href="DeleteAgent.php?idAdmi=<?php echo $ligne["idAdmi"] ?>" class="btn btn-danger">Confirmer</a>
                  </div>
                </div>
              </div>
            </div>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

<?php
include_once("Footer.php");
?>