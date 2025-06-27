<?php
session_name("ADMIN_SESSION");
session_start();
include_once("main.php");

//$idClient = isset($_GET['idClient']) ? intval($_GET['idClient']) : 0;

if (isset($_POST['BtnLogin'])) {
    try {
        $email = htmlspecialchars(trim($_POST['loginEmail']));
        $password = htmlspecialchars(trim($_POST['loginPassword']));

        $requete = "SELECT * FROM TAdministrateur WHERE MailAdmi = :email LIMIT 1";
        $pdostmt = $pdo->prepare($requete);
        $pdostmt->execute([':email' => $email]);

        $user = $pdostmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['Motdepass'])) {
                $_SESSION['user_id'] = $user['idAdmi'];
                $_SESSION['NomAdmi'] = $user['NomAdmi'];
                $_SESSION['MailAdmi'] = $user['MailAdmi'];

                // Redirection vers modifClient.php avec l'idClient sélectionné
                header("Location:EspaceAdministrateur.php");
                exit;
            } else {
                $message = "Mot de passe incorrect.";
            }
        } else {
            $message = "Adresse email inconnue.";
        }

        $pdostmt->closeCursor();
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }
}
?>

<!-- Formulaire de connexion -->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">

        <div id="loginForm">
            <a href="Index.php"><i class="bi bi-x text-danger" style="font-size: 2.5rem;"></i></a>
            <h3 class="text-center mb-4">Connexion</h3>
            <?php if (isset($message)): ?>
                <div class="alert alert-danger text-center"><?php echo $message; ?></div>
            <?php endif; ?>
            <form method="POST">
                <!-- Champ caché pour conserver l'idClient -->
                <input type="hidden" name="idClient" value="<?php echo htmlspecialchars($idClient); ?>">

                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Adresse e-mail</label>
                    <input type="email" name="loginEmail" class="form-control" id="loginEmail" placeholder="Entrez votre e-mail" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Mot de passe</label>
                    <input type="password" name="loginPassword" class="form-control" id="loginPassword" placeholder="Mot de passe" required>
                </div>
                <div class="d-grid mb-2">
                    <button type="submit" name="BtnLogin" class="btn btn-primary">Se connecter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once("Header.php");
include_once("Footer.php");
?>