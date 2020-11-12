<?php
    session_start();
    include("conecta.php");
    $idcliente = $_GET["cliente"];
    $valor = $_GET["valor"];
    $data = date("Y-m-d");

    $sql = "INSERT INTO pedidos (data_pedido ,valor,status_pedido, fk_idcliente) VALUES ('$data','$valor','A', '$idcliente')";

    if(mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Pedido cadastrado com sucesso!');
        window.location.href = 'vendas.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Pedido não foi cadastrado com sucesso!');
        window.location.href = 'vendas.php';
        </script>";
    }

    unset($_SESSION['itens']);
    

    mysqli_close($conn);
?>