<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $idpedido = $_GET['idpedido'];
    $vendedor = $_GET['idvendedor'];


    $sql2 = "UPDATE pedidos SET status_pedido='I', fk_idvendedor='$vendedor' WHERE idpedidos='$idpedido'";

    if(mysqli_query($conn, $sql2)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto aprovado com sucesso!');
        window.location.href = 'pedido.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto não foi aprovado com sucesso!');
        window.location.href = 'pedido.php';
        </script>";
    }
    mysqli_close($conn);
?>