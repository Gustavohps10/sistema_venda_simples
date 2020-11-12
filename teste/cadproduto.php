<?php
    include("conecta.php");
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $valor = $_POST['valor'];
    $status = $_POST['status'];

    $sql = "INSERT INTO produtos(descricao,estoque,valor,status_produto) VALUES ('$descricao','$estoque','$valor','$status')";
    if(mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto cadastrado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Produto não foi cadastrado com sucesso!');
        window.location.href = 'produto.php';
        </script>";
    }
    mysqli_close($conn);
?>