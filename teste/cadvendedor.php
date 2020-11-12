<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf_pessoa'];
    $status = $_POST['status'];
    $salario = $_POST['salario'];
    $senha = base64_encode($_POST['senha']);
    $login = $_POST['login'];

    $sql = "INSERT INTO pessoas (nome,cpf,status_pessoas) VALUES ('$nome','$cpf','$status')";
    mysqli_query($conn, $sql);

    $result = mysqli_query($conn, "SELECT idpessoas, cpf FROM pessoas  WHERE cpf = '$cpf'") or die(mysqli_connect_error());

    $vendedor = mysqli_fetch_array($result);        
    $fk = $vendedor['idpessoas'];

    $sql = "INSERT INTO vendedores (salario,fk_idpessoas, senha, login) VALUES ('$salario','$fk','$senha', '$login')";

    if(mysqli_query($conn, $sql)){
        echo "<script language='javascript' type='text/javascript'>
        alert('Vendedor cadastrado com sucesso!');
        window.location.href = 'vendedor.php';
        </script>";
    }
    else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Vendedor não foi cadastrado com sucesso!');
        window.location.href = 'vendedor.php';
        </script>";
    }
    

    mysqli_close($conn);
?>