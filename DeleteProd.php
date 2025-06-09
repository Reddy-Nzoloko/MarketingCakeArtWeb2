<?php
    include_once("main.php"); 
    if(!empty($_GET["idProduit"])){
        $Req="DELETE FROM TProduit where idProduit=:id";
        $objstmt=$pdo->prepare($Req);
        $objstmt->execute(["id"=>$_GET["idProduit"]]);
        $objstmt->closeCursor();
        header("Location:Article.php");

    }
?>