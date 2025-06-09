CREATE DATABASE MarketingCakeArt;
-- les clés etrangères aurons tous la mensions F....
CREATE DATABASE IF NOT EXISTS MarketingCakeArt;
CREATE TABLE  IF NOT EXISTS TAdministrateur(idAdmi INT primary key, NomAdmi VARCHAR(100)NOT NULL, MailAdmi varchar(200) not null, PhoneAdmi varchar(200) not null, Motdepass varchar(500)not null);
True CREATE TABLE IF NOT EXISTS TClient(idClient int primary key, NomClient VARCHAR(300) not null, MailClient VARCHAR(300) NOT NULL, PhoneClient VARCHAR(300) NOT NULL);
True CREATE TABLE IF NOT EXISTS TProduit(idProduit int primary key, NomProd varchar(300) not null, CategorieProd ENUM('Disponible', 'Indisponible') not null,TypeProd ENUM('Mariage','Anniversaire','Autre Ceremonie') not null, PrixProd Double, DateEntreProd date not null, DateExpiration date not null, PhotoProd varchar(500) not null);
True CREATE TABLE IF NOT EXISTS TCommentaire(idCommentaire int primary key auto_increment, Commentaire varchar(500), Evaluation ENUM('Bonne', 'Mauvais') NOT NULL, DateCommentaire Date not null);
CREATE TABLE IF NOT EXISTS TCommande(idCommande int primary key, Fproduit int, foreign key (Fproduit) REFERENCES TProduit(idProduit), Fclient int, foreign key (Fclient) references TClient(idClient), NbrProduit INT Not null, PrixTotal Double);
CREATE TABLE IF NOT EXISTS TPaiement(idPaiement int primary key, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande), Montant Double, DatePaiement DATE);
CREATE TABLE IF NOT EXISTS TCommandeEffectuer(idComEffectuer int primary key, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande), DateComEffectuer date);
CREATE TABLE IF NOT EXISTS TCommandeNonEffectuer(idComNonEffect int primary key, Fcommande int, foreign key (Fcommande) REFERENCES TCommande(idCommande));


True = Table dont le crud est déjà au top
