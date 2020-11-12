<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf_pessoa'];
    $status = $_POST['status'];
    $renda = $_POST['renda'];
    $credito = $_POST['credito'];
    $senha_cl = base64_encode($_POST['senha']);
    $login_cl = $_POST['login'];

    $sql = "INSERT INTO pessoas (nome,cpf,status_pessoas) VALUES ('$nome','$cpf','$status')";
    mysqli_query($conn, $sql);

    $result = mysqli_query($conn, "SELECT idpessoas, cpf FROM pessoas  WHERE cpf = '$cpf'") or die(mysqli_connect_error());

    $cliente = mysqli_fetch_array($result);        
    $fk = $cliente['idpessoas'];

    $sql = "INSERT INTO clientes (renda,credito,fk_idpessoa, senha, login) VALUES ('$renda','$credito','$fk','$senha_cl', '$login_cl')";

    if(mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Cliente cadastrado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Cliente não foi cadastrado com sucesso!');
        window.location.href = 'cliente.php';
        </script>";
    }
    

    mysqli_close($conn);
?>