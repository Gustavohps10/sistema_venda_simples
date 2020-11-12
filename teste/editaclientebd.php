<?php
    session_start();
    if($_SESSION["tipo"] !="vendedor"){
        header('location:inicio.php');
    }
    include("conecta.php");
    $idcliente = $_GET['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf_pessoa'];
    $status = $_POST['status'];
    $renda = $_POST['renda'];
    $credito = $_POST['credito'];
    $senha_cl = base64_encode($_POST['senha']);
    $login_cl = $_POST['login'];



    $result = mysqli_query($conn, "SELECT * FROM view_clientes  WHERE idcliente = '$idcliente'") or die(mysqli_connect_error());
    $cliente = mysqli_fetch_array($result);        
    $fk = $cliente['idpessoas'];

    $sql = "UPDATE pessoas SET nome='$nome', cpf=$cpf, status_pessoas='$status' WHERE idpessoas='$fk'";

    mysqli_query($conn,$sql);


    $sql2 =  "UPDATE clientes SET renda='$renda', credito=$credito, login='$login_cl', senha='$senha_cl' WHERE idcliente='$idcliente'";

    if(mysqli_query($conn, $sql2)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente atualizado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Cliente não foi atualizado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    mysqli_close($conn);
?>