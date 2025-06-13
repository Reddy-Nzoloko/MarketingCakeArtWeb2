<?php
$Commande = true;
include_once("Header.php");
include_once("main.php");
?>
<h1><i class="bi bi-cart"> Faites vos commandes des bons Gateaux avec </i><i class="bi bi-cake2-fill">Cake Art</i></i> Et profiter d'une livraison Rapide<i class="bi bi-truck"></i> </h1>
<div class="text-center p-3 bg-white rounded shadow-sm">
  <p class="text-dark">
    <i class="bi bi-cart-plus text-primary"></i> Envie de douceur ? Passez votre commande dès maintenant !
  </p>
  <p class="text-secondary">
    <i class="bi bi-box-seam text-info"></i> Nos gâteaux sont faits maison, frais et prêts à être savourés.
  </p>
  <p class="text-success">
    <i class="bi bi-truck"></i> Livraison rapide garantie, directement chez vous.
  </p>
  <p class="text-warning">
    <i class="bi bi-star-fill"></i> Rejoignez nos nombreux clients satisfaits !
  </p>
  <p class="text-danger fw-bold">
    <i class="bi bi-heart-fill"></i> Commandez maintenant et faites fondre vos papilles !
  </p>
</div>
<a class="btn btn-lg btn-primary" href="#" role="button"><i class="bi bi-cake2-fill">Cake Art</i></a>
<!-- Integrer la data tables pour l'affichage des données -->
<table id="datatableCom" class="display">
  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>
</main>
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<?php
include_once("Footer.php");
?>