<?php

    session_start();

    $idproduto = $_GET["id"];
    unset($_SESSION['itens'][$idproduto]);
    echo "<script language='javascript' type='text/javascript'>
        alert('Produto excluido do carrinho com sucesso!');
        window.location.href = 'carrinho.php';
        </script>";
?>