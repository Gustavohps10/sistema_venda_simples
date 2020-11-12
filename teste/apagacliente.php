<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM view_clientes  WHERE idcliente = '$id'") or die(mysqli_connect_error());
    $cliente = mysqli_fetch_array($result);        
    $fk = $cliente['idpessoas'];


    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0") or die(mysqli_connect_error());
    mysqli_query($conn, "DELETE FROM pessoas WHERE idpessoas='$fk'") or die(mysqli_connect_error());
    $sql = "DELETE FROM clientes WHERE idcliente='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente apagado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    else
    {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente não foi apagado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1") or die(mysqli_connect_error());
    mysqli_close($conn);
?>