 <!-- Php pour le formulaire de connexion du client -->
 <?php
    session_name("CLIENT_SESSION");
    session_start();
    include_once("main.php");

    if (isset($_POST['BtnCon'])) {
        try {
            $email = trim($_POST['Mails'] ?? '');
            $password = $_POST['MotPass'] ?? '';

            if (empty($email) || empty($password)) {
                $message = "Tous les champs sont requis.";
            } else {
                // Requête pour chercher l’utilisateur
                $requete = "SELECT * FROM TClient WHERE MailClient = :email LIMIT 1";
                $pdostmt = $pdo->prepare($requete);
                $pdostmt->execute([':email' => $email]);

                $user = $pdostmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Vérifie si la colonne "passWordClient" existe bien en base
                    if (password_verify($password, $user['passWordClient'])) {
                        $_SESSION['idClient'] = $user['idClient'];
                        $_SESSION['Name'] = $user['NomClient'];
                        $_SESSION['numberPhone'] = $user['PhoneClient'];
                        $_SESSION['EmailClient'] = $user['MailClient'];

                        header("Location: Commande.php");
                        exit;
                    } else {
                        $message = "Mot de passe incorrect.";
                    }
                } else {
                    $message = "Adresse e-mail introuvable.";
                }

                $pdostmt->closeCursor();
            }
        } catch (PDOException $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    }
    ?>

 <!-- Formulaire de commande -->
 <section id="Commande">
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
         <div class="card p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">

             <!-- Formulaire de connexion -->
             <div id="loginForm">
                <a href="Index.php"><i class="bi bi-x text-danger" style="font-size: 2.5rem;"></i></a>
                 <h3 class="text-center mb-4">Commande</h3>
                 <form method="POST">
                     <div class="mb-3">
                         <label for="loginEmail" class="form-label">Adresse e-mail</label>
                         <input type="email" class="form-control" id="loginEmail" name="Mails" placeholder="Entrez votre e-mail" required>
                     </div>
                     <div class="mb-3">
                         <label for="loginPassword" class="form-label">Mot de passe</label>
                         <input type="password" class="form-control" name="MotPass" id="loginPassword" placeholder="Mot de passe" required>
                     </div>
                     <div class="d-grid mb-2">
                         <button type="submit" name="BtnCon" class="btn btn-primary">Se connecter</button>
                     </div>
                 </form>
             </div>
             <!-- Formulaire d'inscription -->
         </div>
     </div>
 </section>
 <?php
    include_once("Header.php");
    include_once("Footer.php");
    ?>