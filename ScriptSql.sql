CREATE DATABASE MarketingCakeArt;
-- les clés etrangères aurons tous la mensions F....
CREATE DATABASE IF NOT EXISTS MarketingCakeArt;
True CREATE TABLE  IF NOT EXISTS TAdministrateur(idAdmi INT primary key, NomAdmi VARCHAR(100)NOT NULL, MailAdmi varchar(200) not null, PhoneAdmi varchar(200) not null, Motdepass varchar(500)not null);
True CREATE TABLE IF NOT EXISTS TClient(idClient int primary key, NomClient VARCHAR(300) not null, MailClient VARCHAR(300) NOT NULL, PhoneClient VARCHAR(300) NOT NULL);
True CREATE TABLE IF NOT EXISTS TProduit(idProduit int primary key, NomProd varchar(300) not null, CategorieProd ENUM('Disponible', 'Indisponible') not null,TypeProd ENUM('Mariage','Anniversaire','Autre Ceremonie') not null, PrixProd Double, DateEntreProd date not null, DateExpiration date not null, PhotoProd varchar(500) not null);
True CREATE TABLE IF NOT EXISTS TCommentaire(idCommentaire int primary key auto_increment, Commentaire varchar(500), Evaluation ENUM('Bonne', 'Mauvais') NOT NULL, DateCommentaire Date not null);
True CREATE TABLE IF NOT EXISTS TClient(idClient int primary key auto_increment, NomClient VARCHAR(300) not null, MailClient VARCHAR(300) NOT NULL, PhoneClient VARCHAR(300) NOT NULL);
CREATE TABLE IF NOT EXISTS TCommande(idCommande int primary key auto_increment, Fproduit int, foreign key (Fproduit) REFERENCES TProduit(idProduit), Fclient int, foreign key (Fclient) references TClient(idClient), NbrProduit INT Not null, PrixTotal Double);
CREATE TABLE IF NOT EXISTS TPaiement(idPaiement int primary key auto_increment, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande), Montant Double, DatePaiement DATE);
CREATE TABLE IF NOT EXISTS TCommandeEffectuer(idComEffectuer int primary key auto_increment, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande), DateComEffectuer date);
CREATE TABLE IF NOT EXISTS TCommandeNonEffectuer(idComNonEffect int primary key auto_increment, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande));


True = Table dont le crud est déjà au top

-- Triggeur dans la tables produit qui assure que la date d'expiration soit ulterieur à celle de l'insertion
use MarketingCakeArt;
DELIMITER //
CREATE TRIGGER trg_TProduit_BeforeInsertUpdate
BEFORE INSERT ON TProduit
FOR EACH ROW
BEGIN
    IF NEW.PrixProd <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le prix du produit (PrixProd) doit être supérieur à zéro.';
    END IF;
    IF NEW.DateExpiration <= NEW.DateEntreProd THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La date d''expiration (DateExpiration) doit être postérieure à la date d''entrée (DateEntreProd).';
    END IF;
END;
//

CREATE TRIGGER trg_TProduit_BeforeUpdate
BEFORE UPDATE ON TProduit
FOR EACH ROW
BEGIN
    IF NEW.PrixProd <= 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Le prix du produit (PrixProd) doit être supérieur à zéro.';
    END IF;
    IF NEW.DateExpiration <= NEW.DateEntreProd THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La date d''expiration (DateExpiration) doit être postérieure à la date d''entrée (DateEntreProd).';
    END IF;
END;
//

-- Trigger 3: Calcul automatique du PrixTotal pour TCommande
-- -----------------------------------------------------------------------------
-- Ce déclencheur s'exécute AVANT l'insertion ou la mise à jour d'une commande
-- dans la table TCommande.
-- Il calcule automatiquement le PrixTotal de la commande en multipliant
-- le nombre de produits (NbrProduit) par le PrixProd du produit concerné,
-- récupéré depuis la table TProduit.
-- Cela évite les erreurs de calcul manuel et assure la cohérence des prix.
-- -----------------------------------------------------------------------------
CREATE TRIGGER trg_TCommande_CalculatePrixTotal
BEFORE INSERT ON TCommande
FOR EACH ROW
BEGIN
    DECLARE product_price DOUBLE;
    -- Récupère le prix du produit associé à la commande
    SELECT PrixProd INTO product_price FROM TProduit WHERE idProduit = NEW.Fproduit;
    -- Calcule le prix total de la commande
    SET NEW.PrixTotal = NEW.NbrProduit * product_price;
END;
//

CREATE TRIGGER trg_TCommande_UpdatePrixTotal
BEFORE UPDATE ON TCommande
FOR EACH ROW
BEGIN
    DECLARE product_price DOUBLE;
    -- Récupère le prix du produit associé à la commande
    SELECT PrixProd INTO product_price FROM TProduit WHERE idProduit = NEW.Fproduit;
    -- Recalcule le prix total si NbrProduit ou Fproduit est modifié
    SET NEW.PrixTotal = NEW.NbrProduit * product_price;
END;
//

-- Trigger 4: Gestion des commandes effectuées/non effectuées après paiement
-- -----------------------------------------------------------------------------
-- Ce déclencheur s'exécute APRÈS l'insertion d'un paiement dans la table TPaiement.
-- Il vérifie si le montant total payé pour une commande atteint ou dépasse
-- le PrixTotal de cette commande.
-- Si la commande est entièrement payée :
--   - Elle est insérée dans TCommandeEffectuer (si elle n'y est pas déjà).
--   - Elle est supprimée de TCommandeNonEffectuer (si elle s'y trouvait).
-- Si la commande n'est pas entièrement payée :
--   - Elle est insérée dans TCommandeNonEffectuer (si elle n'y est pas déjà).
--   - Elle est supprimée de TCommandeEffectuer (si elle s'y trouvait).
-- Ce mécanisme automatise le suivi de l'état des commandes basé sur les paiements.
-- -----------------------------------------------------------------------------
CREATE TRIGGER trg_TPaiement_AfterInsert
AFTER INSERT ON TPaiement
FOR EACH ROW
BEGIN
    DECLARE total_paid DOUBLE;
    DECLARE order_total DOUBLE;
    DECLARE order_id INT;

    SET order_id = NEW.Fcommande;

    -- Calcule le montant total payé pour cette commande
    SELECT SUM(Montant) INTO total_paid FROM TPaiement WHERE Fcommande = order_id;

    -- Récupère le prix total de la commande
    SELECT PrixTotal INTO order_total FROM TCommande WHERE idCommande = order_id;

    IF total_paid >= order_total THEN
        -- La commande est entièrement payée
        -- Insère dans TCommandeEffectuer si elle n'y est pas déjà
        INSERT IGNORE INTO TCommandeEffectuer (Fcommande, DateComEffectuer)
        VALUES (order_id, CURDATE());

        -- Supprime de TCommandeNonEffectuer si elle y était
        DELETE FROM TCommandeNonEffectuer WHERE Fcommande = order_id;
    ELSE
        -- La commande n'est pas entièrement payée
        -- Insère dans TCommandeNonEffectuer si elle n'y est pas déjà
        INSERT IGNORE INTO TCommandeNonEffectuer (Fcommande)
        VALUES (order_id);

        -- Supprime de TCommandeEffectuer si elle y était (cas d'un paiement annulé ou partiel après un paiement complet)
        DELETE FROM TCommandeEffectuer WHERE Fcommande = order_id;
    END IF;
END;
//

DELIMITER ;


-- Triggeur pour eviter de commender un produit indisponibles dans la tables produits 
CREATE TRIGGER before_insert_commande
BEFORE INSERT ON TCommande
FOR EACH ROW
BEGIN
  DECLARE cat ENUM('Disponible', 'Indisponible');

  SELECT CategorieProd INTO cat FROM TProduit WHERE idProduit = NEW.Fproduit;

  IF cat = 'Indisponible' THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Impossible de commander un produit indisponible';
  END IF;
END;

DELIMITER //

-- Ce déclencheur s'exécute APRÈS la suppression d'une ligne dans la table TClient.
-- Il est conçu pour nettoyer toutes les données associées à un client supprimé
-- dans les tables TCommande, TPaiement, TCommandeEffectuer, et TCommandeNonEffectuer.
-- L'ordre des suppressions est crucial : nous supprimons d'abord les enregistrements
-- dans les tables "enfants" (TPaiement, TCommandeEffectuer, TCommandeNonEffectuer)
-- avant de supprimer les enregistrements dans la table "parente" (TCommande).
-- Ceci est fait pour respecter les contraintes de clé étrangère au cas où
-- ON DELETE CASCADE n'est pas configuré sur ces tables.
CREATE TRIGGER trg_TClient_CascadeDelete_Manual
AFTER DELETE ON TClient
FOR EACH ROW
BEGIN
    -- Déclare une variable pour stocker l'ID du client qui vient d'être supprimé.
    -- OLD.idClient fait référence à la valeur de l'idClient de la ligne juste avant sa suppression.
    DECLARE deleted_client_id INT;
    SET deleted_client_id = OLD.idClient;

    -- Étape 1: Supprimer les enregistrements dans les tables enfants de TCommande.
    -- Il faut supprimer les paiements, les commandes effectuées, et les commandes non effectuées
    -- avant de supprimer les commandes elles-mêmes.

    -- Supprime tous les paiements (TPaiement) liés aux commandes de ce client.
    -- Le sous-select trouve tous les idCommande qui appartiennent au client supprimé.
    DELETE FROM TPaiement
    WHERE Fcommande IN (SELECT idCommande FROM TCommande WHERE Fclient = deleted_client_id);

    -- Supprime toutes les entrées dans TCommandeEffectuer liées aux commandes de ce client.
    DELETE FROM TCommandeEffectuer
    WHERE Fcommande IN (SELECT idCommande FROM TCommande WHERE Fclient = deleted_client_id);

    -- Supprime toutes les entrées dans TCommandeNonEffectuer liées aux commandes de ce client.
    DELETE FROM TCommandeNonEffectuer
    WHERE Fcommande IN (SELECT idCommande FROM TCommande WHERE Fclient = deleted_client_id);

    -- Étape 2: Supprimer les commandes elles-mêmes.
    -- Une fois que tous les enregistrements dépendants (paiements, statuts) ont été supprimés,
    -- nous pouvons supprimer les commandes (TCommande) qui appartenaient au client.
    DELETE FROM TCommande
    WHERE Fclient = deleted_client_id;

    -- Note: La table TCommentaire n'a pas de lien direct (clé étrangère) avec TClient
    -- dans le schéma que vous avez fourni. Si elle en avait un, une ligne DELETE similaire
    -- serait nécessaire ici pour nettoyer les commentaires du client.
END;
//

DELIMITER ;
