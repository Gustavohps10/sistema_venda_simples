<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $idproduto = $_GET['id'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];


    $sql2 = "UPDATE produtos SET descricao='$descricao', estoque='$estoque', valor='$valor', status_produto='$status' WHERE idprodutos='$idproduto'";

    if(mysqli_query($conn, $sql2)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto atualizado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Produto não foi atualizado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    mysqli_close($conn);
?>