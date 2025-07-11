<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" rel="stylesheet">
  <title>Cake Art </title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbar-static/">
  <!-- Bootstrap core CSS -->
  <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://kit.fontawesome.com/14273d579a.js" crossorigin="anonymous"></script>
  <!-- Integration de la partie de la dataTables -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>

  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">

  <!-- Style -->
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <style>
    section {
      padding: 60px 0;
    }
  </style>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-muted bg-primary" href="#">Cake Art Market</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link <?php echo !empty($index) ? "active" : "" ?> " aria-current="page" href="Index.php">Acceiul</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link <?php //echo !empty($Article)?"active":""
                                    ?>" href="Article.php">Articles</a> -->
            <a class="nav-link" href="#cake">Articles</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link <?php //echo !empty($Client)?"active":""
                                    ?>" href="Client.php" tabindex="-1">Clients</a> -->
            <a class="nav-link" href="#InscriptionClient">Inscription</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link <?php //echo !empty($Commande)?"active":""
                                    ?>" href="Commande.php" tabindex="-1">Commandes</a> -->
            <a class="nav-link" href="LoginClient.php">Commande</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link <?php //echo !empty($Commande)?"active":""
                                    ?>" href="Commande.php" tabindex="-1">Commandes</a> -->
            <a class="nav-link" href="#localisation">Localisation <i class="bi bi-geo"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo !empty($Apropos) ? "active" : "" ?>" href="Apropos.php">A propos</a>
          </li>
        </ul>
        <form class="d-flex">
          <a class="btn btn-outline-danger" href="Logout.php"><i class="bi bi-box-arrow-right"></i></a>
          <a class="btn btn-outline-success" href="Login.php"><i class="bi bi-box-arrow-in-right">Connexion</i></a>
        </form>
      </div>
    </div>
  </nav>

  <!-- Custom styles for this template -->
  <link href="navbar-top.css" rel="stylesheet">
  </header>