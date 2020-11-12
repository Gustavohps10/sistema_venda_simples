<?php
    session_start();
    if($_SESSION["tipo"] !="cliente"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $id = $_GET['id'];


    $sql = "DELETE FROM pedidos WHERE idpedidos='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pedido apagado com sucesso!');
        window.location.href = 'pedido.php';
        </script>";
    }
    else
    {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Pedido não foi apagado com sucesso!');
        window.location.href = 'pedido.php';
        </script>";
    }
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1") or die(mysqli_connect_error());
    mysqli_close($conn);
?>