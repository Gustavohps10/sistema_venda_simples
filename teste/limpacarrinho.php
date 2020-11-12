<?php
    session_start();
    unset($_SESSION['itens']);
    echo "<script language='javascript' type='text/javascript'>
        alert('Carrinho limpo com sucesso!');
        window.location.href = 'carrinho.php';
        </script>";
?>