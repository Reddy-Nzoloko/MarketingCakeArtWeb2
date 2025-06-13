<?php
    include_once("main.php"); 
    if(!empty($_GET["idAdmi"])){
        $Req="DELETE FROM TAdministrateur where idAdmi=:id";
        $objstmt=$pdo->prepare($Req);
        $objstmt->execute(["id"=>$_GET["idAdmi"]]);
        $objstmt->closeCursor();
        header("Location:Apropos.php");

    }
?>