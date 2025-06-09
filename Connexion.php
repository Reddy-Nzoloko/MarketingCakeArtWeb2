<?php
    class Connect extends PDO{
        const HOST = "localhost";
        const BD= "MarketingCakeArt";
        const Users ="root";
        const Pass = "Reddy";
        //Fonction pour la chaine de connexion
        public function __construct()
        {   try{
            parent::__construct("mysql:dbname=".self::BD.";host=".self::HOST,self::Users,self::Pass);
            echo '.';
        }
        catch(PDOException $e){
            echo $e->getMessage()." " .$e->getFile(). " " .$e->getLine();
        }         

        }
    }
?>