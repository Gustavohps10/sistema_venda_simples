<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $id = $_GET['id'];


    $sql = "DELETE FROM produtos WHERE idprodutos='$id'";
    
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto apagado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    else
    {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto não foi apagado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    mysqli_close($conn);
?>