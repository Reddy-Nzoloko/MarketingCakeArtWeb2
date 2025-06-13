<!-- Insertion de l'entête -->
<?php
$index = true;
include_once("Header.php");
include_once("main.php");
$count = 0;


//Commentaire qui marche deja dans le card 2
try {

  if (isset($_POST['Btn2'])) {
    // Récupération des données
    $commentaire = htmlspecialchars($_POST['commentaire2']);
    //$commentaire = 'Jolie ce gateaux';
    $note = $_POST['Evaluer'];
    $DateCom = date("Y-m-d");
    if ($note == 'Bonne') {
      $note = "Bonne";
    } else if ($note == 'Mauvais') {
      $note = "Mauvais";
    }

    $data = [
      ':com' => $commentaire,
      ':note' => $note,
      ':catego' => $DateCom,
    ];
    $requete = "INSERT into TCommentaire
                (Commentaire, Evaluation, DateCommentaire) 
                values 
                (:com,:note,:catego)";

    $pdostmt = $pdo->prepare($requete);
    $pdostmt->execute($data);
    $pdostmt->closeCursor();
  }
} catch (PDOException $e) {
  //echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
}
?>

<!-- Php pour changer la photo d'acceuil -->
<?php
$Requette = "SELECT PhotoProd FROM tproduit where idProduit=1";
$pdostmt = $pdo->prepare($Requette);
$pdostmt->execute();
?>
<!-- Boucle While pour l'errangement -->
<?php
while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
  $count++;
?>
  <!-- Container des Description de l'acceuil -->
  <section id="intro">
    <div class="container-lg bg-light">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-5 text-center text-md-start">
          <h1>
            <div class="display-2"> <i class="bi bi-cake2-fill"></i>Cake Art</div>
            <div class="display-5 text-muted"> La saveur des vos fêtes avec des bons gateaux </div>
          </h1>
          <p class="lead my-4 text-muted"> la decoration de vos ceremonie avec des gateaux de Cake Art <i class="bi bi-cake2-fill"></i></p>
          <a href="Commande.php" class=" btn btn-secondary btn-lg">commande</a>
          <!-- <a href="#" class="d-block mt-3" data-bs-toggle="offcanvas" role="button" aria-controls="sidebar">
            cake art </a> -->
        </div>
        <div class="col-md-5 text-center">
          <span class="tt" data-bs-placement="bottom" title="Gateau d'anniversaire">
            <img class="img-fluid mt-2" shadow-sm hover-shadow" style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"
              src="<?php echo $ligne["PhotoProd"] ?>" alt="Gateaux d'acceuil provenant de la base de donner">
            <!-- <img class="img-fluid mt-2" src="<?php echo $ligne["PhotoProd"] ?>" alt="Gateaux d'acceuil provenant de la base de donner"> -->
          </span>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
  </section>
  <!-- <h1><i class="bi bi-cake2-fill"></i> Cake Art</h1>
<div class="p-4 bg-white rounded shadow-sm text-center">
  <h5 class="text-primary">
    <i class="bi bi-shop-window"></i> Douceurs Suprêmes
  </h5>
  <p class="text-dark">
    <i class="bi bi-cake2-fill text-info"></i> Des gâteaux moelleux, <span class="text-primary">faits maison</span>,
    avec une touche de magie sucrée.
  </p>
  <p class="text-secondary">
    <i class="bi bi-star-fill text-warning"></i> Goûtez l’excellence dans chaque bouchée, décorée avec amour et précision.
  </p>
  <p>
    <i class="bi bi-emoji-heart-eyes-fill text-danger"></i> Nos créations font fondre les cœurs et émerveillent les papilles.
  </p>
  <p class="text-info">
    <i class="bi bi-truck text-success"></i> Livraison rapide et soignée pour chaque occasion spéciale.
  </p>
</div>
<a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill"></i> Cake Art</a>
</div> -->
  </main>

  <!-- Integration des design supplementaire -->

  <?php
  try {
    if (isset($_POST['envoyerCommentaire1'])) {
      $commentaire = htmlspecialchars(trim($_POST['Commentaire1']));
      $note = $_POST['Evaluation'] ?? '';

      $dateCommentaire = date("Y-m-d");

      if (!empty($commentaire) && in_array($note, ['Bonne', 'Mauvais'])) {
        $data = [
          ':Commentaire' => $commentaire,
          ':Note' => $note,
          ':DateCommentaire' => $dateCommentaire
        ];

        $requete = "INSERT into TCommentaire
              (Commentaire, Evaluation, DateCommentaire) 
              values 
              (:Commentaire,:Note,:DateCommentaire)";

        $pdostmt = $pdo->prepare($requete);

        if ($pdostmt->execute($data)) {
          echo "<div class='alert alert-success text-center'>Commentaire envoyé avec succès !</div>";
        } else {
          echo "<div class='alert alert-danger text-center'>Échec de l'enregistrement du commentaire.</div>";
        }

        $pdostmt->closeCursor();
      } else {
        echo "<div class='alert alert-warning text-center'>Merci de remplir tous les champs.</div>";
      }
    }
  } catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
  }
  ?>
  <!-- section cake -->

  <section id="cake" class="bg-light mt-5">
    <div class="container-lg">
      <div class="text-center">
        <h2><i class="bi bi-cake2-fill"></i> Cake </h2>
        <p class="lead text-muted"> Choisi le gateau de ton choix</p>
      </div>
      <div class="row my-5 align-items-center justify-content-center g-5">
        <div class="col-8 col-lg-4 col-xl-3">
          <div class="card  border-0">
            <div class="card-body text-center py-4">
              <h4 class="card-title">
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                <i class="bi bi-star"></i>
                Gateau de mariage
              </h4>
              <p class="lead card-subtitle">Faite la commande à tous le prix du getaux de mariage</p>


              <!-- Code php pour afficher le prix et les photos des gateaux qui sont dans la base de données -->
              <?php
              $Requette = "SELECT PrixProd, PhotoProd FROM tproduit where idProduit=2";
              $pdostmt = $pdo->prepare($Requette);
              $pdostmt->execute();
              ?>

              <!-- Boucle While pour l'errangement -->
              <?php
              while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
                $count++;
              ?>
                <!-- Balise form pour me permettre de gerer les PHP dans ce code lors du traitement des commentaites -->
                <form method="POST" name="Form1">
                  <p class="display-5 my-5 text-primary fw-bold"> $<?php echo $ligne["PrixProd"] ?> </p>
                  <p class="card-text mx-5 text-muted d-none d-lg-block"> <i class="bi bi-alarm"></i>Faite la commende en temps réel pour avoir une bonne finalité</p>
                  <img class="img img-fluid" src="<?php echo $ligne["PhotoProd"] ?>" alt="">
                  <div class="d-flex justify-content-center gap-2 mt-3">
                    <!-- Ajoute un champ caché pour la note -->
                    <input type="hidden" name="Evaluation" id="evaluationInput" value="">

                    <!-- Bouton Like -->
                    <button class="btn btn-sm btn-outline-success" type="button" onclick="setEvaluation('Bonne')">
                      <i class="bi bi-hand-thumbs-up"></i> J'aime
                    </button>

                    <!-- Bouton Dislike -->
                    <button class="btn btn-sm btn-outline-danger" type="button" onclick="setEvaluation('Mauvais')">
                      <i class="bi bi-hand-thumbs-down"></i> J'aime pas
                    </button>
                    <!-- Js pour recuperer la note de la transaction -->
                    <script>
                      function setEvaluation(note) {
                        document.getElementById('evaluationInput').value = note;
                      }
                    </script>


                    <!-- Bouton Like -->
                    <!-- <button class="btn btn-sm btn-outline-success" onclick="garderActif(this)" type="button" name="Like">
                  <i class="bi bi-hand-thumbs-up"></i> J'aime
                </button> -->

                    <!-- Bouton Dislike -->
                    <!-- <button class="btn btn-sm btn-outline-danger" onclick="garderActif(this)" type="button" name="DisLike">
                  <i class="bi bi-hand-thumbs-down"></i> J'aime pas
                </button> -->
                  </div>
                  <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                    <!-- Champ de commantaire -->
                    <div class="w-50">
                      <label for="commentaire" class="form-label">Commentaire</label>
                      <textarea class="form-control" id="Commentaire1" name="Commentaire1" rows="5" placeholder="Écris ton commentaire ici..."></textarea>
                      <button type="submit" class="btn btn-primary" name="envoyerCommentaire1">Envoyer</button>
                    </div>
                  </div>
                  <a class="btn btn-outline-primary btn-lg mt-3" href="https://wa.me/+243971920530?text=Salut%Nous%Somme%Cake%Art%Que%voulez%vous.?">Commande maintenant</a>
                </form>
              <?php endwhile; ?>
            </div>
          </div>
        </div>


        <!-- dexieme card -->

        <!-- code pour selectionner la photo et le prix  -->
        <?php
        $Requette = "SELECT PrixProd, PhotoProd FROM tproduit where idProduit=3";
        $pdostmt = $pdo->prepare($Requette);
        $pdostmt->execute();
        ?>

        <!-- Boucle While pour l'errangement -->
        <?php
        while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
          $count++;
        ?>

          <div class="col-8 col-lg-4 col-xl-5">
            <div class="card  border-primary ">
              <div class="card-body text-center py-4">
                <h4 class="card-title">
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  Gateau d'anniversaire
                </h4>
                <p class="lead card-subtitle">Faite la commande à tous le prix du getaux d'anniversaire</p>
                <form method="POST" name="Form2">
                  <p class="display-5 my-5 text-primary fw-bold">$<?php echo $ligne["PrixProd"] ?></p>
                  <p class="card-text mx-5 text-muted d-none d-lg-block"> <i class="bi bi-alarm"></i>Faite la commande en temps réel pour avoir une bonne finalité</p>
                  <img class="img img-fluid" src="<?php echo $ligne["PhotoProd"] ?>" alt="">
                  <div class="d-flex justify-content-center gap-2 mt-3">
                    <!-- Bouton Like -->
                    <!-- <button class="btn btn-sm btn-outline-success" type="button" onclick="garderActif(this)">
                    <i class="bi bi-hand-thumbs-up"></i> J'aime
                  </button> -->

                    <!-- essaie du bouton radion -->
                    <div id="Radio">
                      <label for="" class="btn btn-sm btn-outline-success"><i class="bi bi-hand-thumbs-up"></i>Like</label>
                      <input type="radio" class="btn btn-sm btn-outline-success" name="Evaluation" value="Bonne">

                      <label for="" class="btn btn-sm btn-outline-danger"><i class="bi bi-hand-thumbs-down"></i>Dislike</label>
                      <input type="radio" class="btn btn-sm btn-outline-danger" name="Evaluation" value="Mauvais">
                    </div>

                    <!-- Bouton Dislike -->
                    <!-- <button class="btn btn-sm btn-outline-danger" type="button" onclick="garderActif(this)">
                    <i class="bi bi-hand-thumbs-down"></i> J'aime pas
                  </button> -->
                  </div>
                  <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                    <!-- Champ de commentaire -->
                    <div class="w-50">
                      <label for="commentaire" class="form-label">Commentaire</label>
                      <textarea class="form-control" name="commentaire2" rows="5" placeholder="Écris ton commentaire ici..."></textarea>
                      <button type="submit" name="Btn2" id="Btn3" class="btn btn-4 btn-primary">Envoyer</button>
                    </div>
                  </div>
                  <a class="btn btn-outline-primary btn-lg mt-3" href="https://wa.me/+243971920530?text=Salut%Nous%Somme%Cake%Art%Que%voulez%vous.?">Commande maintenant</a>
                </form>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <!-- 3eme card -->

        <!-- code pour selectionner la photo et le prix  -->
        <?php
        $Requette = "SELECT PrixProd, PhotoProd FROM tproduit where idProduit=4";
        $pdostmt = $pdo->prepare($Requette);
        $pdostmt->execute();
        ?>

        <!-- Boucle While pour l'errangement -->
        <?php
        while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
          $count++;
        ?>

          <!-- Commentaire pour le 3 eme Card -->
          <?php
          try {

            if (isset($_POST['Btn3'])) {
              $commentaire3 = htmlspecialchars($_POST['commentaire3']);
              $note3 = $_POST['Evaluer'];
              $DateCom3 = date("Y-m-d");
              if ($note3 == 'Bonne') {
                $note3 = "Bonne";
              } else if ($note3 == 'Mauvais') {
                $note3 = "Mauvais";
              }

              $data3 = [
                ':com' => $commentaire3,
                ':note' => $note3,
                ':catego' => $DateCom3,
              ];
              $requete3 = "INSERT into TCommentaire
                (Commentaire, Evaluation, DateCommentaire) 
                values 
                (:com,:note,:catego)";

              $pdostmt = $pdo->prepare($requete3);
              $pdostmt->execute($data3);
              $pdostmt->closeCursor();
            }
          } catch (PDOException $e) {
            //echo "<div class='alert alert-danger'>Erreur : " . $e->getMessage() . "</div>";
          }
          ?>
          <div class="col-8 col-lg-4 col-xl-3">
            <div class="card  border-0">
              <div class="card-body text-center py-4">
                <h4 class="card-title">
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star"></i>
                  <i class="bi bi-star-half"></i>
                  Autre ceremonie
                </h4>
                <p class="lead card-subtitle">Faite la commande à tous le prix du getaux d'autre ceremonie </p>
                <form method="POST" action="">
                  <p class="display-5 my-5 text-primary fw-bold">$<?php echo $ligne["PrixProd"] ?></p>
                  <p class="card-text mx-5 text-muted d-none d-lg-block"> <i class="bi bi-alarm"></i>Faite la commende en temps réel pour avoir une bonne finalité</p>
                  <img class="img img-fluid" src="<?php echo $ligne["PhotoProd"] ?>" alt="">
                  <div class="d-flex justify-content-center gap-2 mt-3">
                    <!-- Bouton Like -->
                    <!-- <button class="btn btn-sm btn-outline-success" type="button" onclick="garderActif(this)">
                  <i class="bi bi-hand-thumbs-up"></i> J'aime
                </button> -->
                    <div id="Radio">
                      <label for="" class="btn btn-sm btn-outline-success"><i class="bi bi-hand-thumbs-up"></i>Like</label>
                      <input type="radio" class="btn btn-sm btn-outline-success" name="Evaluer" value="Bonne">

                      <label for="" class="btn btn-sm btn-outline-danger"><i class="bi bi-hand-thumbs-down"></i>Dislike</label>
                      <input type="radio" class="btn btn-sm btn-outline-danger" name="Evaluer" value="Mauvais">
                    </div>
                    <!-- Bouton Dislike -->
                    <!-- <button class="btn btn-sm btn-outline-danger" type="button" onclick="garderActif(this)">
                  <i class="bi bi-hand-thumbs-down"></i> J'aime pas
                </button> -->
                  </div>
              </div>
              <div class="d-flex justify-content-center align-items-center" style="min-height: 300px;">
                <!-- Champ de commentaire -->
                <div class="w-50">
                  <label for="commentaire" class="form-label">Commentaire</label>
                  <textarea class="form-control" id="commentaire3" name="commentaire3" rows="5" placeholder="Écris ton commentaire ici..."></textarea>
                  <button type="submit" id="Btn3" name="Btn3" class="btn btn-4 btn-primary">Envoyer</button>
                </div>
              </div>
              <a class="btn btn-outline-primary btn-lg mt-3" href="https://wa.me/+243971920530?text=Salut%Nous%Somme%Cake%Art%Que%voulez%vous.?">Commande maintenant</a>
              </form>
            </div>
          </div>
      </div>
    </div>
  <?php endwhile; ?>

  </div>
  </section>
  Affichages des commentaire
  <div class="container">
    <h2 class="h2 text-primary text-center">Suivi des commentaire </h2>
    <div class="table-responsive">
      <table id="datatable" class="table table-bordered display nowrap">
        <thead>
          <tr>
            <th>N° Commentaire</th>
            <th>Commentaire</th>
            <th>Evaluation</th>
            <th>Date Commentaire</th>
          </tr>
        </thead>
        <tbody>
          <!-- selection des commentaire de la bdd -->

          <!-- Selection dans la base de donnée -->
          <?php
          $Requette = "SELECT * FROM TCommentaire";
          $pdostmt = $pdo->prepare($Requette);
          $pdostmt->execute();

          ?>
          <?php while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
            $count++;
          ?>
            <tr>
              <td><?php echo $ligne["idCommentaire"] ?></td>
              <td><?php echo $ligne["Commentaire"] ?></td>
              <td><?php echo $ligne["Evaluation"] ?></td>
              <td><?php echo $ligne["DateCommentaire"] ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>


  <!-- Carroucel  -->
  <!-- Accordings  -->
  <section id="realisation">
    <div class="container-md">
      <div class="text-center">
        <h2> Nos realisation ...</h2>
        <p class="lead text-muted"> Nos réalisation sont au top niveau et respecte les normes de la cuisine moderne</p>
      </div>
      <!-- code pour selectionner la photo de la bdd puis l'afficher dans le caroussel  -->
      <?php
      $Requette = "SELECT PhotoProd FROM tproduit Where idProduit = 1";
      $pdostmt = $pdo->prepare($Requette);
      $pdostmt->execute();
      ?>

      <!-- Boucle While pour l'errangement -->
      <?php
      while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
        $count++;
      ?>
        <div class="row my-5 g-5 justify-content-around align-items-center">
          <!--  Carousel Avec contenue provenant de la bdd -->
          <div id="carouselExampleCaptions"
            class="carousel slide"
            data-bs-ride="carousel"
            data-bs-interval="3000"
            style="width: 50%; float: left;">

            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
              <div class="carousel-item active">
                <!-- <img src="telechargement/cakePhine.JPG" class="d-block w-100" alt="..."> -->
                <img src="<?php echo $ligne["PhotoProd"] ?>" class="d-block w-100" alt="Gâteau 1">
                <!-- <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" class="d-block w-100" alt="Gâteau 1"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5><i class="bi bi-cake2-fill"></i>Cake Art Gateaux d'Anniversaire</h5>
                  <p>Les gateuax des anniversaire qui ont de la bonne crème.</p>
                </div>
              </div>
            <?php endwhile; ?>

            <!-- code pour selectionner la photo de la bdd puis l'afficher dans le caroussel  -->
            <?php
            $Requettes = "SELECT PhotoProd FROM tproduit Where idProduit = 2";
            $pdostmt = $pdo->prepare($Requettes);
            $pdostmt->execute();
            ?>

            <!-- Boucle While pour l'errangement -->
            <?php
            while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
              $count++;
            ?>
              <div class="carousel-item">
                <img src="<?php echo $ligne["PhotoProd"] ?>" class="d-block w-100" alt="Gateaux 2 Bdd">
                <!-- <img src="telechargement/cakeAvecBougie.JPG" class="d-block w-100" alt="Gâteau 3"> -->
                <!-- <img src="https://images.unsplash.com/photo-1599785209707-28f69e98a47b" class="d-block w-100" alt="Gâteau 3"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5><i class="bi bi-cake2-fill"></i>Cake Art Gateaux de Mariage</h5>
                  <p>collorez vos fetes avec les bons gateaux de mariages .</p>
                </div>
              </div>
            <?php endwhile; ?>
            <!-- code pour selectionner la photo de la bdd puis l'afficher dans le caroussel  -->
            <?php
            $Requette = "SELECT PhotoProd FROM tproduit Where idProduit = 3";
            $pdostmt = $pdo->prepare($Requette);
            $pdostmt->execute();
            ?>

            <!-- Boucle While pour l'errangement -->
            <?php
            while ($ligne = $pdostmt->fetch(PDO::FETCH_ASSOC)):
              $count++;
            ?>
              <div class="carousel-item">
                <img src="<?php echo $ligne["PhotoProd"] ?>" class="d-block w-100" alt="Gateuax 3">
                <!-- <img src="https://images.unsplash.com/photo-1621996346565-c980dcf199e1" class="d-block w-100" alt="Gâteau 3"> -->
                <div class="carousel-caption d-none d-md-block">
                  <h5><i class="bi bi-cake2-fill"></i>Cake Art Gateaux d'autres ceremonies</h5>
                  <p>Pour autres ceremonies ayant au moins un bon gateau avec la bonne saveur.</p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          </div>


          <!-- Accordion -->
          <div class="col-lg-6">
            <!-- accordion -->
            <div class="accordion" id="chapters">
              <div class="accordion-item">
                <h2 class="accordion-header" id="heading-1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#chapter-1" aria-expanded="true" aria-controls="chapter-1">
                    Gateau de mariage - Recette de mariage <i class="bi bi-fork-knife"></i> <i class="bi bi-cake2-fill"></i>
                  </button>
                </h2>
                <div id="chapter-1" class="accordion-collapse collapse " aria-labelledby="heading-1" data-bs-parent="chapters">
                  <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum maxime, tenetur porro veniam laborum mollitia minus libero rerum officia hic?</p>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, aliquid recusandae ullam autem perferendis voluptatibus assumenda obcaecati maxime et in?</p>
                  </div>
                </div>
              </div>

              <!-- chapter2  -->
              <!-- accordion -->
              <div class="accordion" id="chapters">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#chapter-2" aria-expanded="true" aria-controls="chapter-2">
                      Gateau d'anniversaire - Recette d'anniversaire<i class="bi bi-egg-fried"></i>
                    </button>
                  </h2>
                  <div id="chapter-2" class="accordion-collapse collapse " aria-labelledby="heading-1" data-bs-parent="chapters">
                    <div class="accordion-body">
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum maxime, tenetur porro veniam laborum mollitia minus libero rerum officia hic?</p>
                      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, aliquid recusandae ullam autem perferendis voluptatibus assumenda obcaecati maxime et in?</p>
                    </div>
                  </div>
                </div>

                <!-- chapter3  -->
                <!-- accordion -->
                <div class="accordion" id="chapters">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-1">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#chapter-3" aria-expanded="true" aria-controls="chapter-3">
                        Gateau de graduation - Recette of graduation <i class="bi bi-cake2-fill"> Cake</i>
                      </button>
                    </h2>
                    <div id="chapter-3" class="accordion-collapse collapse " aria-labelledby="heading-1" data-bs-parent="chapters">
                      <div class="accordion-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum maxime, tenetur porro veniam laborum mollitia minus libero rerum officia hic?</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, aliquid recusandae ullam autem perferendis voluptatibus assumenda obcaecati maxime et in?</p>
                      </div>
                    </div>
                  </div>

                  <!-- Chapter4 -->
                  <!-- accordion -->
                  <div class="accordion" id="chapters">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#chapter-4" aria-expanded="true" aria-controls="chapter-4">
                          Gateau de simple ceremonie - Recette simple<i class="bi bi-cup-hot"></i>
                        </button>
                      </h2>
                      <div id="chapter-4" class="accordion-collapse collapse " aria-labelledby="heading-1" data-bs-parent="chapters">
                        <div class="accordion-body">
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum maxime, tenetur porro veniam laborum mollitia minus libero rerum officia hic?</p>
                          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea, aliquid recusandae ullam autem perferendis voluptatibus assumenda obcaecati maxime et in?</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  </section>
  <!-- Affichage des tous les produits de la bdd -->

  <div class="container">
    <h1><i class="bi bi-gift"> Faites des Surprises à vos proches avec <i class="bi bi-cake2-fill">Cake Art</i></i> </h1>
    <p class="lead">Avec un bon prix <i class="bi bi-tag"></i> Chez <i class="bi bi-cake2-fill">Cake Art</i>, chaque gâteau est une œuvre d’art sucrée<i class="bi bi-emoji-smile"></i>.
      Préparés avec des ingrédients frais et de qualité,
      produits allient goût raffiné et présentation élégante.
      Le moelleux<i class="bi bi-cupcake"></i>, la saveur et l'équilibre <i class="bi bi-emoji-smile"></i>parfait du sucre font toute la différence.
      Une seule bouchée suffit pour vous faire revenir ! 🍰💫 </p>
    <a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill">Cake Art</i></a>

    <!-- Selection dans la base de donnée -->
    <?php
    $Requette = "SELECT * FROM tproduit where idProduit >= 5";
    $pdostmt = $pdo->prepare($Requette);
    $pdostmt->execute();
    //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <!-- Integrer la data tables pour l'affichage des données -->
    <div class="table-responsive">
      <table id="datatables" class="table table-bordered display nowrap">
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
            <!-- <th>Action</th> -->
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

            <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php
  $pdo = new connect()
  ?>
  </div>

  <!-- Formulaire d'escription client client -->
  <?php
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
  <section id="InscriptionClient">
    <div class="container" id="FormAjout">
      <h3 class="text-center mb-4">Inscription client</h3>
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
        <div class="d-grid mb-2">
          <button type="submit" name="BtnModif" class="btn btn-primary ">Créer le compte</button>
        </div>

      </form>
    </div>
  </section>
  <!-- Formulaire de commande -->
  <section id="Commande">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="card p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">

        <!-- Formulaire de connexion -->
        <div id="loginForm">
          <h3 class="text-center mb-4">Connexion</h3>
          <form>
            <div class="mb-3">
              <label for="loginEmail" class="form-label">Adresse e-mail</label>
              <input type="email" class="form-control" id="loginEmail" placeholder="Entrez votre e-mail" required>
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="loginPassword" placeholder="Mot de passe" required>
            </div>
            <div class="d-grid mb-2">
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
            <div class="d-grid">
              <a class="btn btn-outline-primary" href="#">Je n'ai pas de compte</a>
              <!-- <button  type="button" class="btn btn-outline-primary" onclick="toggleForms()">Je n'ai pas de compte</button> -->
            </div>
          </form>
        </div>

        <!-- Formulaire d'inscription -->
        <div id="registerForm" style="display: none;">
          <h3 class="text-center mb-4">Créer un compte</h3>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nom complet</label>
              <input type="text" class="form-control" id="name" placeholder="Votre nom" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Téléphone</label>
              <input type="tel" class="form-control" id="phone" placeholder="Numéro de téléphone" required>
            </div>
            <div class="mb-3">
              <label for="registerEmail" class="form-label">Adresse e-mail</label>
              <input type="email" class="form-control" id="registerEmail" placeholder="Entrez votre e-mail" required>
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="registerPassword" placeholder="Mot de passe" required>
            </div>
            <div class="d-grid mb-2">
              <button type="submit" class="btn btn-success">Créer le compte</button>
            </div>
            <div class="d-grid">
              <button type="button" class="btn btn-outline-secondary" onclick="toggleForms()">J'ai déjà un compte</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>


  <!-- Section de la localisation  -->
  <section id="localisation">
    <div class="container-fluid">
      <div class="text-center justify-content-center">
        <h5>Nos adresses <i class="bi bi-geo"></i> </h5>
      </div>
      <div class="row">
        <div class="col justify-content-center text-center">
          <p class="lead text-muted"> <i class="bi bi-geo"></i> Retrouver nous principalement à Lukanga campus wallace</p>
          <div class="col col-12 justify-content-center text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d127674.17150931299!2d29.218450474764985!3d0.027533371525268812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1scampus%20universite%20adventiste%20de%20lukanga!5e0!3m2!1sfr!2scd!4v1735760504310!5m2!1sfr!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="col justify-content-center text-center">
        <p class="lead text-muted"> <i class="bi bi-geo"></i> Retrouver cake art en Beni ville quartier Ntoni</p>
        <div class="col col-12 justify-content-center text-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127669.55484919368!2d29.37915347493337!3d0.488026745312009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1761ab017951ba17%3A0xa45247d1f6b2a53c!2sBeni!5e0!3m2!1sfr!2scd!4v1735760260818!5m2!1sfr!2scd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- Insertion du footer -->
  <?php
  include_once("Footer.php");
  ?>