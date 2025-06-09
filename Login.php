<?php
$Apropos = true;
include_once("Header.php");
include_once("main.php");
$count = 0;
?>
<!-- Formulaire de connexion -->
  <!-- Formulaire d'essaie -->
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
            <a class="btn btn-outline-primary" href="AjoutClient.php">Je n'ai pas de compte</a>
            <!-- <button  type="button" class="btn btn-outline-primary" onclick="toggleForms()">Je n'ai pas de compte</button> -->
          </div>
        </form>
      </div>
<!-- <?php
  include_once("Footer.php");
  ?> -->
