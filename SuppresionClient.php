<?php
    include_once("main.php"); 
    if(!empty($_GET["idClient"])){
        $Req="DELETE FROM TClient where idClient=:id";
        $objstmt=$pdo->prepare($Req);
        $objstmt->execute(["id"=>$_GET["idClient"]]);
        $objstmt->closeCursor();
        header("Location:Client.php");

    }
?>